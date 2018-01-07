<?php
namespace JMessage\IM;
use JMessage\IM;

class ChatRoom extends IM {

    const BASE_URI = 'https://api.im.jpush.cn/v1/chatroom/';

    public function listAll($count, $start = 0) {
        $uri = self::BASE_URI;
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->get($uri, $query);
        return $response;
    }

    public function create($name, $owner, array $members = [], $description = null ) {
        $uri = self::BASE_URI;
        $body = [
            'name'              => $name,
            'owner_username'    => $owner
        ];
        if (!empty($members)) {
            $body['members_username'] = $members;
        }
        if (!is_null($description)) {
            $body['description'] = $description;
        }
        $response = $this->post($uri, $body);
        return $response;
    }

    public function show($roomId) {
        return $this->showBatch([$roomId]);
    }

    public function showBatch(array $roomIds) {
        $uri = self::BASE_URI . batch;
        $body = $roomId;
        $response = $this->post($uri, $body);
        return $response;
    }

    public function update($roomId, array $options) {
        $uri = self::BASE_URI . $roomId;
        $body = $options;
        $response = $this->put($uri, $body);
        return $response;
    }

    public function delete($roomId) {
        $uri = self::BASE_URI . $roomId;
        $response = $this->del($uri);
        return $response;
    }

    public function forbiddenUser($roomId, $user, bool $enabled) {
        $status = $enabled ? 1 : 0;
        $uri = self::BASE_URI . $roomId . '/forbidden/' . $user . '?status=' . $status;
        $response = $this->put($uri);
        return $response;
    }

    public function memebers($roomId, $count, $start = 0) {
        $uri = self::BASE_URI . $roomId. '/members';
        $query = [
            'start' => $start,
            'count' => $count
        ];
        $response = $this->get($uri, $query);
        return $response;
    }

    public function addMembers($roomId, array $members) {
        $uri = self::BASE_URI . $roomId . '/members';
        $body = $members;
        $response = $this->put($uri, $body);

    }
    public function removeMembers($roomId, array $members) {
        $uri = self::BASE_URI . $roomId . '/members';
        $body = $members;
        $response = $this->del($uri, $body);
        return $response;
    }
}
