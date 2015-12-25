<?php
namespace Engine;

use Phalcon\DI;
use Phalcon\DiInterface;
use Phalcon\Events\Manager;
use Engine\Interfaces\BootstrapInterface;
use Engine\Plugin\DispatchErrorHandler;
use Engine\Behavior\DIBehavior;
use Engine\Constants\AccountType as EnAccountType;
use Engine\Session\JWT as EnJWT;
use Firebase\JWT\JWT as FirebaseJWT;
use User\Plugin\Account\Email as UserEmailAccount;
use User\Model\User as UserModel;
use User\Plugin\AuthManager as UserAuthManager;

/**
 * Bootstrap class.
 *
 * @category  ThePhalconPHP
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
abstract class Bootstrap implements BootstrapInterface
{
    use DIBehavior {
        DIBehavior::__construct as protected __DIConstruct;
    }

    /**
     * Module name.
     *
     * @var string
     */
    protected $_moduleName = "";

    /**
     * Configuration.
     *
     * @var PhalconConfig
     */
    private $_config;

    /**
     * Events manager.
     *
     * @var Manager
     */
    private $_em;

    /**
     * Create Bootstrap.
     *
     * @param DiInterface $di Dependency injection.
     * @param Manager     $em Events manager.
     */
    public function __construct($di, $em)
    {
        $this->__DIConstruct($di);
        $this->_em = $em;
        $this->_config = $this->getDI()->get('config');
    }

    /**
     * Register the services.
     *
     * @throws Exception
     * @return void
     */
    public function registerServices()
    {
        if (empty($this->_moduleName)) {
            $class = new \ReflectionClass($this);
            throw new \Exception('Bootstrap has no module name: ' . $class->getFileName());
        }

        $di = $this->getDI();
        $config = $this->getConfig();
        $eventsManager = $this->getEventsManager();
        $moduleDirectory = $this->getModuleDirectory();

        /*************************************************/
        //  Initialize view.
        /*************************************************/
        $di->set(
            'view',
            function () use ($di, $config, $moduleDirectory, $eventsManager) {
                return View::factory($di, $config, $moduleDirectory . '/View/', $eventsManager);
            }
        );

        /*************************************************/
        //  Initialize authentication manager.
        /*************************************************/
        $di->setShared('auth', function() use($di, $config) {
            $sessionManager = new EnJWT(new FirebaseJWT());
            $authManager = new UserAuthManager($sessionManager);

            // Setup Email Account Type
            // -----------------------------------

            // 1. Instantiate Email Account Type
            $authEmail = new UserEmailAccount(EnAccountType::EMAIL);

            // 2. Set User Model
            // $authEmail->setUserModel(new UserModel());

            // 3. Set Email Account Model
            // $authEmail->setEmailAccountModel(new \EmailAccount);

            // 4. Set Mail Service
            // $authEmail->setMailService(AppServices::MAIL_SERVICE);

            return $authManager
                ->addAccount(EnAccountType::EMAIL, $authEmail)
                ->setExpireTime($config->global->authentication->expireTime);
        });

        /*************************************************/
        //  Initialize dispatcher.
        /*************************************************/
        $eventsManager->attach('dispatch:beforeException', new DispatchErrorHandler());

        // Create dispatcher.
        $dispatcher = new Dispatcher();
        $dispatcher->setEventsManager($eventsManager);
        $di->set('dispatcher', $dispatcher);
    }

    /**
     * Get current module directory.
     *
     * @return string
     */
    public function getModuleDirectory()
    {
        return $this->getDI()->get('registry')->directories->modules . $this->_moduleName;
    }

    /**
     * Get config object.
     *
     * @return mixed|PhalconConfig
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * Get events manager.
     *
     * @return Manager
     */
    public function getEventsManager()
    {
        return $this->_em;
    }

    /**
     * Get current module name.
     *
     * @return string
     */
    public function getModuleName()
    {
        return $this->_moduleName;
    }
}
