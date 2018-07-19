<?php
namespace OCA\TransmissionGUI\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\Controller;

use OCA\TransmissionGUI\Classes\Torrent;

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

		$entries = array(
			new Torrent('Torrent 1 name', 1.5, 100, 'Finished', 0, 42, 4, 6, 3.2),
			new Torrent('Torrent 2 name', 1.3, 65, 'Downloading', 6, 12, 5, 8, 0.2),
			new Torrent('Torrent 3 name', 4.5, 84, 'Downloading', 8, 32, 1, 4, 0.1)
		);

		return new TemplateResponse('nc-transmission', 'index', array('torrents' => $entries));  // templates/index.php
	}

}
