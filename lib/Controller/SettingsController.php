<?php

namespace OCA\transmissionremote\Controller;

use OCP\AppFramework\Controller;
use OCP\AppFramework\Http\JSONResponse;
use OCP\IRequest;
use OCP\IConfig;

class SettingsController extends Controller
{
    private $userId;
    private $config;

    public function __construct($appName, IRequest $request, $userId, IConfig $config)
    {
        parent::__construct($appName, $request);
        $this->userId = $userId;
        $this->config = $config;
    }

    /**
     * @NoAdminRequired
     * @param $settings
     * @return JSONResponse
     * @throws \OCP\PreConditionNotMetException
     */
    public function saveSettings($settings)
    {
        $this->config->setUserValue($this->userId, 'transmissionremote', 'host', $settings['host']);
        $this->config->setUserValue($this->userId, 'transmissionremote', 'port', $settings['port']);
        $this->config->setUserValue($this->userId, 'transmissionremote', 'user', $settings['user']);
        $this->config->setUserValue($this->userId, 'transmissionremote', 'pass', $settings['pass']);

        return new JSONResponse(array(
            'success' => 'true'
        ));
    }
}
