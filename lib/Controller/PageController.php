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
		$parameters = ['torrents' => Torrent::getTorrents()];
		return new TemplateResponse('nc-transmission', 'index', $parameters);  // templates/index.php
	}
	/**
	* @NoAdminRequired
	* @NoCSRFRequired
	* 
	* @param string $direction
	* @param string $column
	*/
	public function torrents($direction = 'none', $column = 'none') {
		$torrents = Torrent::getTorrents();
		$torrents = Torrent::sortTorrents($torrents, $direction, $column);

		if ($direction == 'asc') {
			$direction = 'dsc';
		} else if ($direction == 'dsc') {
			$direction = 'asc';
		} else {
			$direction = 'none';
			$column = 'none';
		}

		$sorting = ['direction' => $direction, 'column' => $column];
		$parameters = ['torrents' => $torrents, 'sorting' => $sorting];
		return new TemplateResponse('nc-transmission', 'index', $parameters);  // templates/index.php
	}
}
