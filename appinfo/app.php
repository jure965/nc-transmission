<?php

use OCA\transmissionremote\AppInfo\Application;

if ((@include_once __DIR__ . '/../vendor/autoload.php') === false) {
    throw new Exception('Cannot include autoload. Did you run install dependencies using composer?');
}

$app = new Application();

$c = $app->getContainer();
