<?php
namespace OCA\TransmissionGUI\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

use OCA\TransmissionGUI\Utils;
use OCA\TransmissionGUI\Torrent;
use OCA\TransmissionGUI\TransmissionRPCRequest;
use OCA\TransmissionGUI\TransmissionRPCResponse;

class PageController extends Controller {
	private $userId;

	public function __construct($AppName, IRequest $request, $UserId){
		parent::__construct($AppName, $request);
		$this->userId = $UserId;
	}

	/**
	 * CAUTION: the @Stuff turns off security checks; for this page no admin is
	 *          required and no CSRF check. If you don't know what CSRF is, read
	 *          it up in the docs or you might create a security hole. This is
	 *          basically the only required method to add this exemption, don't
	 *          add it to any other method if you don't exactly know what it does
	 *
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {

		$url = 'http://localhost:9091/transmission/rpc'; // should be configurable in app
		$data = array('method' => 'torrent-get', 'arguments' => array('fields' => array('id', 'name', 'sizeWhenDone', 'percentDone', 'status', 'peers', 'uploadRatio')), 'tag' => '1234');

		$header = 'X-Transmission-Session-Id:';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$response = curl_exec($ch);

		$header = substr($response, strpos($response, $header), strpos($response, '</code>') - strpos($response, $header));

		curl_setopt($ch, CURLOPT_HTTPHEADER, array($header));
		$response = curl_exec($ch);
		curl_close();

		$response = json_decode($response);
		
		$torrents = array();
		if ($response->result == 'success') {
			foreach ($response->arguments->torrents as $t) {
				array_push($torrents, new Torrent($t));
			}
		}
		return new TemplateResponse('nc-transmission', 'index', array('torrents' => $torrents));  // templates/index.php
	}

}
