<?php
namespace Core\Injection;

use Engine\Injection\AbstractInjection;
use Engine\Config;
use Phalcon\Translate\Adapter\NativeArray as PhTranslateArray;
use Phalcon\Events\Event as PhEvent;
use Phalcon\Mvc\Dispatcher;
use Core\Model\Language as LanguageModel;

/**
 * Core translate api.
 *
 * @category  Core
 * @author    Nguyen Duc Duy <nguyenducduy.it@gmail.com>
 * @copyright 2014-2015
 * @license   New BSD License
 * @link      http://thephalconphp.com/
 */
class Translate extends AbstractInjection
{
    const DEFAULT_LANG_PACK = 'Core';

    /**
     * This action is executed before execute any action in the application.
     *
     * @param PhalconEvent $event      Event object.
     * @param Dispatcher   $dispatcher Dispatcher object.
     *
     * @return mixed
     */
    public function beforeDispatch(PhEvent $event, Dispatcher $dispatcher)
    {
        $di = $this->getDI();
        $config = $di->getConfig();
        $languageCode = '';

        if ($di->get('app')->isConsole()) {
            return;
        }

        // Get default language from language model
        $languageCode = LanguageModel::findFirst([
            'default = :isdefault: AND status = :enable:',
            'bind' => [
                'isdefault' => LanguageModel::IS_DEFAULT,
                'enable' => LanguageModel::STATUS_ENABLE
            ]
        ])->code;
        
        $messages = [];
        $directory = $di->get('registry')->directories->modules . ucfirst($dispatcher->getModuleName()) . '/Lang/'
            . $languageCode . '/'
            . $dispatcher->getControllerName();
        $extension = '.php';

        if (file_exists($directory . $extension)) {
            require $directory . $extension;
        }

        // add default core lang package
        require $di->get('registry')->directories->modules . self::DEFAULT_LANG_PACK . '/Lang/' . $languageCode . '/default.php';

        $translate = new PhTranslateArray([
            'content' => array_merge($messages, $default)
        ]);

        $di->set('lang', $translate);
        return !$event->isStopped();
    }
}
