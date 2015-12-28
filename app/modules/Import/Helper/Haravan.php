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
    const PERMISSION_URI = '/admin/oauth/authorize';
    const OAUTH_URI = '/admin/oauth/access_token';

    /**
     * Return all Products from Haravan Shop
     */
    public function getProducts()
    {
        $this->_session = $this->getDI()->get('session');

        $response = \Requests::get(self::HARAVAN_PROTOCOL . $this->_session->get('shop') . self::PRODUCTS_URI,
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

    public function getProduct()
    {

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
            'Expect' => ''
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
