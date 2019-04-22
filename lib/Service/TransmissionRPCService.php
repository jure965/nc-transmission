<?php

namespace OCA\TransmissionUI\Service;

use OCA\TransmissionUI\Service\TransmissionRPCRequest;

class TransmissionRPCService
{

    private $url;
    private $transmissionSessionIdHeader;

    function __construct($url = 'http://localhost:9091/transmission/rpc')
    {
        $this->url = $url;
    }

    public function findAllTorrents()
    {
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

        $headers = [];
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADERFUNCTION,
            function ($curl, $header) use (&$headers) {
                $len = strlen($header);
                $header = explode(':', $header, 2);
                if (count($header) < 2) // ignore invalid headers
                    return $len;
                $name = strtolower(trim($header[0]));
                if (!array_key_exists($name, $headers))
                    $headers[$name] = [trim($header[1])];
                else
                    $headers[$name][] = trim($header[1]);
                return $len;
            }
        );
        $idx = 0;
        do {
            if ($this->transmissionSessionIdHeader) {
                curl_setopt($ch, CURLOPT_HTTPHEADER, [$this->transmissionSessionIdHeader]);
            }
            $response = curl_exec($ch);
            $responseCode = curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
            if ($responseCode == 409 && array_key_exists('x-transmission-session-id', $headers)) {
                $this->transmissionSessionIdHeader = 'X-Transmission-Session-Id: '
                    . array_shift($headers['x-transmission-session-id']);
            } else {
                break;
            }
            $idx++;
        } while ($responseCode == 409 && array_key_exists('x-transmission-session-id', $headers) && $idx < 2);

        curl_close($ch);

        if ($responseCode == 200) {
            return json_decode($response);
        } else {
            // obviously need to handle error somehow, let the client-side app know
            return $response . "   " . $idx . "   " . $this->transmissionSessionIdHeader;
        }
    }
}
