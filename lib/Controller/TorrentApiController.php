<?php
namespace OCA\TransmissionUI\Controller;

use OCP\IRequest;
use OCP\AppFramework\Http\DataResponse;
use OCP\AppFramework\ApiController;

use OCA\TransmissionUI\Service\TransmissionRPCService;

class TorrentApiController extends ApiController {

    private $service;
	private $userId;

	public function __construct($AppName, IRequest $request, $UserId, TransmissionRPCService $transmissionRPCService) {
		parent::__construct($AppName, $request);
        $this->service = $transmissionRPCService;
		$this->userId = $UserId;
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 */
	public function index() {
		return new DataResponse($this->service->findAllTorrents());
//		return new DataResponse('aaa');
	}
}
