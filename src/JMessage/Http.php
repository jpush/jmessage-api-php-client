<?php
namespace JMessage;

class Http {

    private $client;
    private static $_instance = null;

    public function get($uri, array $query = []) {
        if (!empty($query)) {
            $uri = $uri . '?' . http_build_query($query);
        }
        return self::request($this->client, 'GET', $uri);
    }
    public function post($uri, array $body = []) {
        return self::request($this->client, 'POST', $uri, $body);
    }

    public function put($uri, array $body = []) {
        return self::request($this->client, 'PUT', $uri, $body);
    }

    public function delete($uri, array $body = []) {
        return self::request($this->client, 'DELETE', $uri, $body);
    }

    public function upload($uri, array $body = []) {
        $headers = [
            'Content-Type: multipart/form-data',
            'Connection: Keep-Alive'
        ];
        return self::request($this->client, 'UPLOAD', $uri, $body, $headers);
    }

    public static function getInstance($client) {
        if (is_null(self::$_instance) || !(self::$_instance instanceof self)) {
            self::$_instance = new self($client);
        }
        return self::$_instance;
    }

    private function __construct($client) {
        $this->client = $client;
    }
    private function __clone() {}

    private static function request($client, $method, $uri, array $body = [], array $headers = []) {
        $default_headers = [
            'Content-Type: application/json',
            'Connection: Keep-Alive'
        ];

        $method = strtoupper($method);
        $ch = curl_init();
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HEADER => true,
            CURLOPT_HTTPHEADER => (empty($headers) ? $default_headers : $headers),
            CURLOPT_USERAGENT => 'JMessage-Api-PHP-Client',
            CURLOPT_CONNECTTIMEOUT => 20,
            CURLOPT_TIMEOUT => 120,

            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_USERPWD => $client->getAuth(),

            CURLOPT_URL => $uri,
            CURLOPT_CUSTOMREQUEST => ('UPLOAD' == $method) ? 'POST' : $method
        );

        if (!empty($body)) {
            if ('UPLOAD' == $method) {
                if (class_exists('\CURLFile')) {
                    $options[CURLOPT_SAFE_UPLOAD] = true;
                    $options[CURLOPT_POSTFIELDS] = ['filename' => new \CURLFile($body['path'])];
                } else {
                # TODO
                    if (defined('CURLOPT_SAFE_UPLOAD')) {
                        $options[CURLOPT_SAFE_UPLOAD] = false;
                        $options[CURLOPT_POSTFIELDS] = '';
                    }
                }
            } else {
                $options[CURLOPT_POSTFIELDS] = json_encode($body);
            }
        }

        curl_setopt_array($ch, $options);
        $output = curl_exec($ch);

        if($output === false) {
            return "Error Code:" . curl_errno($ch) . ", Error Message:".curl_error($ch);
        } else {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header_text = substr($output, 0, $header_size);
            $body = substr($output, $header_size);

            $response['body'] = json_decode($body, true);
            $response['http_code'] = $httpCode;
        }
        curl_close($ch);
        return $response;
    }
}
