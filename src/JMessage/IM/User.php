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
        return $this->batchRegister($body);
    }
    public function batchRegister(array $users) {
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

    public function listAll($count, $start = 0) {
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

    # forbidden
    public function forbidden($username, bool $enabled) {
        $uri = self::BASE_URI . $username . '/forbidden?disable' . $enabled;
        $response = $this->put($uri);
        return $response;
    }

    # groupsShield
    public function addGroupsShield($username, array $gids) {
        return $this->updateGroupsShield($username, [ 'add' => $gids ]);
    }
    public function removeGroupsShield($username, array $gids) {
        return $this->updateGroupsShield($username, [ 'remove' => $gids ]);
    }
    private function updateGroupsShield($username, array $options) {
        $uri = self::BASE_URI . $username . '/groupsShield';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }


    public function chatrooms($username) {
        $uri = self::BASE_URI . $username . '/chatroom';
        $response = $this->get($uri);
        return $response;
    }
}
