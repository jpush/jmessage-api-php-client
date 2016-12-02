<?php

namespace JMessage\IM;
use JMessage\Http\Client;

class User {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';
    private $client;

    public function __construct($client) {
        $this->client = Client::getInstance($client);
    }

    public function register(array $users) {
        $uri = self::BASE_URI;
        $body = $users;
        $response = $this->client->post($uri, $body);
        return $response;
    }

    public function getUser($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->client->get($uri);
        return $response;
    }

    public function updateUser($username, array $options) {
        $uri = self::BASE_URI . $username;
        $body = $options;
        $response = $this->client->put($uri, $body);
        return $response;
    }

    public function userStat($username) {
        $uri = self::BASE_URI . $username . '/userstat';
        $response = $this->client->get($uri);
        return $response;
    }

    public function changePassword($username, $password) {
        $uri = self::BASE_URI . $username . '/password';
        $response = $this->client->put($uri, [ 'new_password' => $password ]);
        return $response;
    }

    public function deleteUser($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->client->delete($uri);
        return $response;
    }

    public function getUsers($start = 0, $count = 10) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->client->get($uri, $query);
        return $response;
    }

    ############## BlackList

    public function addBlacklist($user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $usernames;
        $response = $this->client->put($uri, $body);
        return $response;
    }

    public function removeBlacklist($user, array $usernames) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $body = $usernames;
        $response = $this->client->delete($uri, $body);
        return $response;
    }

    public function blacklists($user) {
        $uri = self::BASE_URI . $user . '/blacklist';
        $response = $this->client->get($uri);
        return $response;
    }

    ############## NoDisturb

    public function addSingleNodisturb($user, array $usernames) {
        $single = [ 'add' => $usernames ];
        return $this->nodisturb($user, [ 'single' => $single ]);
    }

    public function removeSingleNodisturb($user, array $usernames) {
        $single = [ 'remove' => $usernames ];
        return $this->nodisturb($user, [ 'single' => $single ]);
    }

    public function addGroupNodisturb($user, array $groups) {
        $group = [ 'add' => $groups ];
        return $this->nodisturb($user, [ 'group' => $group ]);
    }

    public function removeGroupNodisturb($user, array $groups) {
        $group = [ 'remove' => $groups ];
        return $this->nodisturb($user, [ 'group' => $group ]);
    }

    public function setGlobalNodisturb($user, bool $opened) {
        return $this->nodisturb($user, [ 'global' => $opened ]);
    }

    private function nodisturb($user, array $options) {
        $uri = self::BASE_URI . $user . '/nodisturb';
        $body = $options;
        $response = $this->client->post($uri, $body);
        return $response;
    }
}
