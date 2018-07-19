<?php
namespace OCA\TransmissionGUI;

class TransmissionRPCResponse {
    public $result; // string with two possible values: 'success' and error string on error
    public $arguments; // array of key/pair values
    public $tag; // same tag that was sent in request from client
}