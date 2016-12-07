<?php
namespace JMessage\IM;
use JMessage\IM;

class Group extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/groups/';

    public function create($owner, $name, $desc, array $members = []) {
        $uri = self::BASE_URI;
        $body = [
            'owner_username' => $owner,
            'name' => $name,
            'desc' => $desc,
            'members_username' => $members
        ];
        $response = $this->post($uri, $body);
        return $response;
    }

    public function show($gid) {
        $uri = self::BASE_URI . $gid;
        $response = $this->get($uri);
        return $response;
    }

    public function update($gid, $name = null, $desc = null) {
        $uri = self::BASE_URI . $gid;

        $body = [];
        if (!is_null($name)) { $body['name'] = $name; }
        if (!is_null($desc)) { $body['desc'] = $desc; }

        $response = $this->put($uri, $body);
        return $response;
    }

    public function delete($gid) {
        $uri = self::BASE_URI . $gid;
        $response = $this->del($uri);
        return $response;
    }

    public function list($start = 0, $count = 20) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->get($uri, $query);
        return $response;
    }

    public function addMembers($gid, array $add) {
        return $this->updateMembers($gid, [ 'add' => $add ]);
    }
    public function removeMembers($gid, array $remove) {
        return $this->updateMembers($gid, [ 'remove' => $remove ]);
    }
    public function updateMembers($gid, array $options) {
        $uri = self::BASE_URI . $gid . '/members';
        $body = $options;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function members($gid) {
        $uri = self::BASE_URI . $gid . '/members';
        $response = $this->get($uri);
        return $response;
    }
}
