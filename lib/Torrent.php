<?php
namespace OCA\TransmissionGUI;

class Torrent {
    public $name;
    public $size;
    public $done;
    public $status;
    public $peers;
    public $ratio;

    function __construct($t) {
        $this->name = $t->name;
        $this->size = $this->formatBytes($t->sizeWhenDone);
        $this->done = ($t->percentDone * 100).'%';
        $this->status = $this->status($t->status);
        $this->peers = $t->peers;
        $this->ratio = round($t->uploadRatio, 2);
    }

    public static function formatBytes($bytes, $precision = 2) { 
        $units = array('B', 'KiB', 'MiB', 'GiB', 'TiB'); 

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
