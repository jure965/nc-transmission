<?php

namespace OCA\transmissionremote\AppInfo;

use OCP\AppFramework\App;
use OCP\AppFramework\IAppContainer;
use OCP\IContainer;
use OCP\Util;

class Application extends App
{

    /**
     * Application constructor.
     *
     * @param array $urlParams Parameters
     */
    public function __construct(array $urlParams = [])
    {
        parent::__construct('transmissionremote', $urlParams);
        $container = $this->getContainer();

        $container->registerService(
            'URLGenerator', function (IContainer $c) {
            $server = $c->query('ServerContainer');
            return $server->getURLGenerator();
        }
        );
        $container->registerService(
            'UserId', function () {
            $user = \OC::$server->getUserSession()->getUser();
            if ($user) {
                return $user->getUID();
            }
        }
        );
        $container->registerService(
            'L10N', function (IContainer $c) {
            return $c->query('ServerContainer')->getL10N($c->query('AppName'));
        }
        );
        $container->registerService(
            'Config', function (IAppContainer $c) {
            return $c->getServer()->getConfig();
        }
        );
    }
}
