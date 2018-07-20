<?php
namespace OCA\TransmissionGUI;

class Torrent {
    public $id;
    public $name;
    public $sizeWhenDone;
    public $percentDone;
    public $status;
    public $peers;
    public $uploadRatio;
    public $addedDate;

    function __construct($t) {
        $this->id = $t->id;
        $this->name = $t->name;
        $this->sizeWhenDone = $t->sizeWhenDone;
        $this->percentDone = $t->percentDone;
        $this->status = $t->status;
        $this->peers = $t->peers;
        $this->uploadRatio = $t->uploadRatio;
        $this->addedDate = $t->addedDate;
    }

    public function getName() {
        return $this->name;
    }

    public function getSizeWhenDone() {
        return $this->formatBytes($this->sizeWhenDone);
    }
    
    public function getPercentDone() {
        return ($this->percentDone * 100).'%';
    }

    public function getStatus() {
        return $this->status($this->status);
    }

    public function getUploadRatio() {
        return round($this->uploadRatio, 2);
    }

    public function getAddedDate() {
        return date('d.m.Y H:i', $this->addedDate);
    }

    public static function getTorrents($url = 'http://localhost:9091/transmission/rpc') {
        $tag = rand();
        $data = [
            'method' => 'torrent-get',
            'arguments' => [
                'fields' => [
                    'id',
                    'name',
                    'sizeWhenDone',
                    'percentDone',
                    'status',
                    'peers',
                    'uploadRatio',
                    'addedDate'
                ]
            ],
            'tag' => $tag
        ];

		$header = 'X-Transmission-Session-Id:';

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
		$response = curl_exec($ch);

		$header = substr($response, strpos($response, $header), strpos($response, '</code>') - strpos($response, $header));

		curl_setopt($ch, CURLOPT_HTTPHEADER, [$header]);
		$response = curl_exec($ch);
		curl_close();

		$response = json_decode($response);
        
        $torrents = [];
		if ($response->result == 'success' && $response->tag == $tag) {
			foreach ($response->arguments->torrents as $torrent) {
				$torrents[] = new Torrent($torrent);
			}
		}

		return $torrents;
	}

    public static function sortTorrents($torrents, $direction, $property) {
        if ($property == 'name') {
            if ($direction == 'asc') {
                usort($torrents, function($a, $b) {
                    return strcmp($a->name, $b->name);
                });
            } else if ($direction == 'dsc') {
                usort($torrents, function($a, $b) {
                    return strcmp($b->name, $a->name);
                });
            }
        } else if ($property == 'addedDate') {
            if ($direction == 'asc') {
                usort($torrents, function($a, $b) {
                    return $a->addedDate > $b->addedDate;
                });
            } else if ($direction == 'dsc') {
                usort($torrents, function($a, $b) {
                    return $a->addedDate < $b->addedDate;
                });
            }
        }
        return $torrents;
    }

    public static function formatBytes($bytes, $precision = 2) { 
        $units = ['B', 'KiB', 'MiB', 'GiB', 'TiB']; 
        $bytes = max($bytes, 0); 
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024)); 
        $pow = min($pow, count($units) - 1); 
        $bytes /= (1 << (10 * $pow)); 
        return round($bytes, $precision) . ' ' . $units[$pow]; 
    }
    
    public static function status($s) {
        switch (s) {
            case 0:
                return 'Finished';
            default:
                return 'Unknown';
        }
    }

}
