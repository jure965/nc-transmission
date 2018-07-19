<?php
namespace OCA\TransmissionGUI;

class TransmissionRPCRequest {
    public $method; //  name of the method, type: string, required
    public $arguments; // arguments for the method, type: array of key/value pairs, optional
    public $tag; // tag for clients which must be the same in response, type: string, optional

    function __construct($Method, $Arguments, $tag) {
        $this->method = $Method;
        $this->arguments = $Arguments;
        $this->tag = $Tag;
    }
}