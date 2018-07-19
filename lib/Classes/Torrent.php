<?php
namespace OCA\TransmissionGUI\Classes;

class Torrent {
    public $name;
    public $size;
    public $done;
    public $status;
    public $seeds;
    public $seeds_connected;
    public $peers;
    public $peers_connected;
    public $ratio;

    function __construct($Name, $Size, $Done, $Status, $Seeds, $Seeds_connected, $Peers, $Peers_connected, $Ratio) {
        $this->name = $Name;
        $this->size = $Size;
        $this->done = $Done;
        $this->status = $Status;
        $this->seeds = $Seeds;
        $this->seeds_connected = $Seeds_connected;
        $this->peers = $Peers;
        $this->peers_connected = $Peers_connected;
        $this->ratio = $Ratio;
    }
}
