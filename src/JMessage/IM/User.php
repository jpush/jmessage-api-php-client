<?php
namespace JMessage\IM;
use JMessage\IM;

class User extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/users/';

    public function register($username, $password) {
        $body = [[
            'username' => $username,
            'password' => $password
        ]];
        return $this->patchRegister($body);
    }
    public function patchRegister(array $users) {
        $uri = self::BASE_URI;
        $body = $users;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function show($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->get($uri);
        return $response;
    }

    public function update($username, array $options) {
        $uri = self::BASE_URI . $username;
        $body = $options;
        $response = $this->put($uri, $body);
        return $response;
    }

    public function stat($username) {
        $uri = self::BASE_URI . $username . '/userstat';
        $response = $this->get($uri);
        return $response;
    }

    public function updatePassword($username, $password) {
        $uri = self::BASE_URI . $username . '/password';
        $response = $this->put($uri, [ 'new_password' => $password ]);
        return $response;
    }

    public function delete($username) {
        $uri = self::BASE_URI . $username;
        $response = $this->del($uri);
        return $response;
    }

    public function list($start = 0, $count = 10) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->get($uri, $query);
        return $response;
    }

    public function groups($username) {
        $uri = self::BASE_URI . $username . '/groups';
        $response = $this->get($uri);
        return $response;
    }

    ############## NoDisturb

    public function addSingleNodisturb($touser, array $usernames) {
        $single = [ 'add' => $usernames ];
        return $this->nodisturb($touser, [ 'single' => $single ]);
    }

    public function removeSingleNodisturb($touser, array $usernames) {
        $single = [ 'remove' => $usernames ];
        return $this->nodisturb($touser, [ 'single' => $single ]);
    }

    public function addGroupNodisturb($touser, array $gids) {
        $group = [ 'add' => $gids ];
        return $this->nodisturb($touser, [ 'group' => $group ]);
    }

    public function removeGroupNodisturb($touser, array $gids) {
        $group = [ 'remove' => $gids ];
        return $this->nodisturb($touser, [ 'group' => $group ]);
    }

    // public function setGlobalNodisturb($touser, bool $opened) {
    //     return $this->nodisturb($touser, [ 'global' => (int)$opened ]);
    // }

    public function openGlobalNodisturb($touser) {
        return $this->nodisturb($touser, [ 'global' => 1 ]);
    }

    public function closeGlobalNodisturb($touser) {
        return $this->nodisturb($touser, [ 'global' => 0 ]);
    }

    public function nodisturb($touser, array $options) {
        $uri = self::BASE_URI . $touser . '/nodisturb';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }
}
