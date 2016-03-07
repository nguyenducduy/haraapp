<?php
namespace Import\Helper;

use Engine\Helper as EnHelper;

/**
 * Haravan
 *
 * @category  Import
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class Haravan extends EnHelper
{
    protected $_session;

    const HARAVAN_PROTOCOL = 'https://';
    const PRODUCTS_URI = '/admin/products.json';
    const PRODUCTS_URI_COUNT = '/admin/products/count.json';
    const CUSTOM_COLLECTIONS_URI = '/admin/custom_collections.json';
    const CUSTOM_COLLECTIONS_URI_COUNT = '/admin/custom_collections/count.json';
    const SMART_COLLECTIONS_URI = '/admin/smart_collections.json';
    const SMART_COLLECTIONS_URI_COUNT = '/admin/smart_collections/count.json';
    const PERMISSION_URI = '/admin/oauth/authorize';
    const OAUTH_URI = '/admin/oauth/access_token';

    /**
     * Return all Products from Haravan Shop
     */
    public function getProducts($page = 1)
    {
        $this->_session = $this->getDI()->get('session');
        
        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::PRODUCTS_URI . '?page=' . $page,
            [
                'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
            ]
        );

        if ($response->success) {
            return json_decode($response->body)->products;
        } else {
            throw new \Exception($response->body, 1);
        }
    }

    public function getProductsByCollectionId($id, $page = 1)
    {
        $this->_session = $this->getDI()->get('session');

        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::PRODUCTS_URI . '?collection_id=' . (int) $id . '&page=' . $page,
            [
                'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
            ]
        );

        if ($response->success) {
            return json_decode($response->body)->products;
        } else {
            throw new \Exception($response->body, 1);
        }
    }

    public function getTotalProductsByCollectionId($id)
    {
        $this->_session = $this->getDI()->get('session');

        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::PRODUCTS_URI_COUNT . '?collection_id=' . (int) $id,
            [
                'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
            ]
        );

        if ($response->success) {
            return json_decode($response->body)->count;
        } else {
            throw new \Exception($response->body, 1);
        }
    }

    /**
     * Return all custom collections from Haravan Shop
     */
    public function getCollections()
    {
        $output = [];
        $this->_session = $this->getDI()->get('session');

        $total = (int) $this->getTotalCollectionsCount();
        $totalPage = ceil($total / 50);

        for ($i=1; $i <= $totalPage; $i++) {
            $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::CUSTOM_COLLECTIONS_URI . '?page=' . $i,
                [
                    'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
                ]
            );

            if ($response->success) {
                $output = array_merge($output, json_decode($response->body)->custom_collections);
            } else {
                throw new \Exception($response->body, 1);
            }
        }

        return $output;
    }

    /**
     * Count all custom collections from Haravan Shop
     */
    public function getTotalCollectionsCount()
    {
        $this->_session = $this->getDI()->get('session');

        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::CUSTOM_COLLECTIONS_URI_COUNT,
            [
                'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
            ]
        );

        if ($response->success) {
            return json_decode($response->body)->count;
        } else {
            throw new \Exception($response->body, 1);
        }
    }

    /**
     * Return all smart collections from Haravan Shop
     */
    public function getSmartCollections()
    {
        $output = [];
        $this->_session = $this->getDI()->get('session');

        $total = (int) $this->getTotalSmartCollectionsCount();
        $totalPage = ceil($total / 50);

        for ($i=1; $i <= $totalPage; $i++) {
            $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::SMART_COLLECTIONS_URI . '?page=' . $i,
                [
                    'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
                ]
            );

            if ($response->success) {
                $output = array_merge($output, json_decode($response->body)->smart_collections);
            } else {
                throw new \Exception($response->body, 1);
            }
        }

        return $output;
    }

    /**
     * Count all smart collections from Haravan Shop
     */
    public function getTotalSmartCollectionsCount()
    {
        $this->_session = $this->getDI()->get('session');

        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::SMART_COLLECTIONS_URI_COUNT,
            [
                'Authorization' => 'Bearer ' . $this->_session->get('oauth_token')
            ]
        );

        if ($response->success) {
            return json_decode($response->body)->count;
        } else {
            throw new \Exception($response->body, 1);
        }
    }

    /**
     * Return url to grant permission
     */
    public function getAuthorizationUrl($shop, $apiKey, $permissions, $redirectUrl)
    {
        $url = self::HARAVAN_PROTOCOL
            . $shop
            . self::PERMISSION_URI
            . '?client_id=' . $apiKey
            . '&scope=' . urlencode($permissions)
            . '&redirect_uri=' . urlencode($redirectUrl)
            . '&response_type=code';

        return $url;
    }

    /**
     * Return OAuth token
     */
    public function getAccessToken($shop, $apiKey, $secret, $code, $redirectUrl)
    {
        $url = self::HARAVAN_PROTOCOL
            . $shop
            . self::OAUTH_URI;
        $header = [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'charset' => 'utf-8',
            'User-Agent' => 'Super Agent/0.0.1'
        ];
        $data = [
            'client_id' => $apiKey,
            'client_secret' => $secret,
            'code' => $code,
            'redirect_uri' => $redirectUrl,
            'grant_type' => 'authorization_code'
        ];

        $response = \Requests::post($url, $header, $data);
        if ($response->success) {
            return json_decode($response->body)->access_token;
        } else {
            throw new \Exception($response->body, 1);
        }
    }
}
