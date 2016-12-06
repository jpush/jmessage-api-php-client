<?php
namespace JMessage\IM;
use JMessage\Http\Client;

class Group {

    const BASE_URI = 'https://api.im.jpush.cn/v1/groups/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function create($owner, $name, $desc, array $members = []) {
        $uri = self::BASE_URI;
        $body = [
            'owner_username' => $owner,
            'name' => $name,
            'desc' => $desc,
            'members_username' => $owner
        ];
        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function show(gid) {
        $uri = self::BASE_URI . $gid;
        $response = $this->client->get($uri);
        return $response;
    }


    public function update(gid, $options) {
        $uri = self::BASE_URI . $gid;

        $name = $options['name'];
        $desc = $options['desc'];

        if name
        $body = [
            'name' => $name,
            'desc' => $desc
        ];

        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function delete(gid) {
        $uri = self::BASE_URI . $gid;
        $response = $this->client->delete($uri)
        return $response;
    }



}
