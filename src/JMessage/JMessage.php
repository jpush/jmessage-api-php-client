<?php

namespace JMessage;

class JMessage {

    private $appKey;
    private $masterSecret;
    private $options;

    public function __construct($appKey, $masterSecret, array $options = []) {
        $this->appKey = $appKey;
        $this->masterSecret = $masterSecret;
        $this->options = $options;
    }

    public function getAuth() {
        return $this->appKey . ':' . $this->masterSecret;
    }
}
