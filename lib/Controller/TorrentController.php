<?php

namespace OCA\transmissionremote\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\JSONResponse;
use OCP\AppFramework\Controller;
use OCP\IConfig;

use Transmission\Client;
use Transmission\Transmission;

class TorrentController extends Controller
{
    private $userId;
    private $config;

    public function __construct($AppName, IRequest $request, $UserId, IConfig $config)
    {
        parent::__construct($AppName, $request);
        $this->userId = $UserId;
        $this->config = $config;
    }

    /**
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function loadTorrents($data)
    {
        $user = $this->config->getUserValue($this->userId, 'transmissionremote', 'user');
        $pass = $this->config->getUserValue($this->userId, 'transmissionremote', 'pass');
        $host = $this->config->getUserValue($this->userId, 'transmissionremote', 'host');
        $port = $this->config->getUserValue($this->userId, 'transmissionremote', 'port');

        $client = new Client();
        $client->authenticate($user, $pass);
        $transmission = new Transmission($host, $port);
        $transmission->setClient($client);

        $torrents = $transmission->all();

        $torrentsArray = array();

        foreach ($torrents as $torrent) {
            $torrObj = [
                'id' => $torrent->getId(),
                'eta' => $torrent->getEta(),
                'size' => $torrent->getSize(),
                'name' => $torrent->getName(),
                'hash' => $torrent->getHash(),
                'status' => $torrent->getStatus(),
                'peersConnected' => $torrent->getPeersConnected(),
                'percentDone' => $torrent->getPercentDone(),
                'addedDate' => $torrent->getAddedDate(),
                'uploadedEver' => $torrent->getUploadedEver(),
                'uploadRate' => $torrent->getUploadRate(),
                'uploadRatio' => $torrent->getUploadRatio(),
                'downloadDir' => $torrent->getDownloadDir(),
            ];
            array_push($torrentsArray, $torrObj);
        }
        $response = array(
            'data' => $torrentsArray,
            'success' => 'true',
            'host' => $host,
            'port' => $port,
            'user' => $user,
            'pass' => $pass
        );

        return new JSONResponse($response);
    }
}
