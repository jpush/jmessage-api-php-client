# 目录

* [JMessage Client](#jmessage-client)
* [User 用户](#user-用户)
    * [注册用户](#注册用户)
    * [批量注册用户](#批量注册用户)
    * [获取用户列表](#获取用户列表)
    * [获取用户信息](#获取用户信息)
    * [更新用户信息](#更新用户信息)
    * [查询用户在线状态](#查询用户在线状态)
    * [修改密码](#修改密码)
    * [删除用户](#删除用户)
    * [获取用户的群组列表](#获取用户的群组列表)
    * [添加单聊免打扰](#添加单聊免打扰)
    * [移除单聊免打扰](#移除单聊免打扰)
    * [添加群聊免打扰](#添加群聊免打扰)
    * [移除群聊免打扰](#移除群聊免打扰)
    * [开启全局免打扰](#开启全局免打扰)
    * [关闭全局免打扰](#关闭全局免打扰)
* [Admin 管理员](#admin-管理员)
    * [管理员注册](#管理员注册)
    * [获取应用管理员列表](#获取应用管理员列表)
* [Blacklist 黑名单](#blacklist-黑名单)
    * [黑名单列表](#黑名单列表)
    * [添加黑名单](#添加黑名单)
    * [移除黑名单](#移除黑名单)
* [Group 群组](#group-群组)
    * [创建群组](#创建群组)
    * [获取群组详情](#获取群组详情)
    * [更新群组信息（群名 or 群描述）](#更新群组信息群名-or-群描述)
    * [删除群组](#删除群组)
    * [更新群组成员](#更新群组成员)
        * [添加群组成员](#添加群组成员)
        * [移除群组成员](#移除群组成员)
    * [获取群组成员列表](#获取群组成员列表)
    * [获取当前应用的群组列表](#获取当前应用的群组列表)
* [Friend 好友](#friend-好友)
    * [获取好友列表](#获取好友列表)
    * [添加好友](#添加好友)
    * [删除好友](#删除好友)
    * [更新好友备注](#更新好友备注)
* [Resource 媒体资源](#resource-媒体资源)
    * [资源上传](#资源上传)
    * [资源下载](#资源下载)
* [消息相关](#消息相关)
    * [发送文本消息](#发送文本消息)
    * [发送图片消息](#发送图片消息)
    * [发送语音消息](#发送语音消息)
    * [发送自定义消息](#发送自定义消息)
    * [消息撤回](#消息撤回)
* [SensitiveWord 敏感词](#sensitiveword-敏感词)
    * [获取敏感词列表](#获取敏感词列表)
    * [添加敏感词](#添加敏感词)
    * [删除敏感词](#删除敏感词)
    * [修改敏感词](#修改敏感词)
    * [获取敏感词功能状态](#获取敏感词功能状态)
    * [更新敏感词功能状态](#更新敏感词功能状态)

## JMessage Client

```php
use JMessage\JMessage;

$appKey = 'xxxx';
$masterSecret = 'xxxx';

$client = new JMessage($appKey, $masterSecret);
```

## User 用户

```php
use JMessage\IM\User;

$user = new User($client);
```

### 注册单个用户

```php
$user->register($username, $password);
```

**参数：**

> $username: 表示用户名

> $password: 表示密码

**示例：**

```php
$username = 'jiguang';
$password = 'password';
$response = $user->register($username, $password);
```

### 批量注册用户

批量注册用户到极光 IM 服务器，一次批量注册最多支持 500 个用户。

```php
$user->batchRegister(array $users);
```

**参数：**

> $users: 表示将要注册的用户的信息的数组

**示例：**

```php
# 批量注册三个用户

$users = [
  ['username' => 'username0', 'password' => 'password0'],
  ['username' => 'username1', 'password' => 'password1'],
  ['username' => 'jiguang', 'password' => 'password']
];
$response = $user->batchRegister($users);
```

### 获取用户列表

```php
$user->listAll($count, $start = 0);
```

**参数：**

> $start: 开始的记录数

> $count: 要获取的记录个数

**示例：**

```php
# 获取从编号 2 开始的 100 个记录的用户列表
$response = $user->listAll(100, 2);
```

### 获取用户信息

```php
$user->show($username);
```

**参数：**

> $username: 表示想要获取用户信息的用户名。

**示例：**

```php
$username = 'jiguang';
$response = $user->show($username);
```

### 更新用户信息

```php
$user->update($username, array $options);
```

**参数：**

> $username: 表示想要更新其信息的用户的用户名

> $options: 更新选项数组，表示需要更新的用户信息和值。支持 **nickname**、**avatar**、**birthday**、**signature**、**gender**、**region**、**address** 中的一个或多个

参数 | 意义 | 说明
--- | --- | ---
nickname | （选填）用户昵称 | 不支持的字符：英文字符： \n \r\n
avatar | （选填）头像 | 需要填上从文件上传接口获得的 media_id
birthday | （选填）生日 | example: 1990-01-24 yyyy-MM-dd
signature |（选填）签名 | 支持的字符：全部，包括 Emoji
gender | （选填） 性别 | 0 - 未知， 1 - 男 ，2 - 女
region | （选填）地区 | 支持的字符：全部，包括 Emoji
address | （选填）地址 | 支持的字符：全部，包括 Emoji

**示例：**

```php
# 更新用户名为 'jiguang' 的用户的 niackname 和 gender

$username = 'jiguang';
$nickname = 'jpush';

$response = $user->update($username, ['nickname' => $nickname， 'gender' => 2]);
```

### 查询用户在线状态

```php
$user->stat($username)
```

**参数：**

> $username: 表示想要查询在线状态的用户的用户名

**示例：**

```php
$username = 'jiguang';
$response = $user->stat($username);
```

### 修改密码

```php
$user->updatePassword($username, $password);
```

**参数：**

> $username: 表示想要修改密码的用户的用户名

> $password: 新密码

**示例：**

```php

$username = 'jiguang';
$new_password = 'newpassword';
$response = $user->updatePassword($username, $new_password);
```

### 删除用户

```php
$user->delete($username);
```

**参数：**

> $username: 表示想要删除的用户的用户名

**示例：**

```php
# 删除用户名为 'jiguang' 的用户

$username = 'jiguang';
$response = $user->delete($username);
```

### 获取用户的群组列表

```php
$user->groups($username);
```

**参数：**

> $username: 表示想要获取其群组列表的用户

**示例：**

```php
# 获取用户 'jiguang' 的群组列表

$username = 'jiguang';
$response = $user->groups($username);
```

### 添加单聊免打扰

```php
$user->addSingleNodisturb($touser, array $usernames);
```

**参数：**

> $touser: 表示要设置免打扰的当前用户

> $usernames: 表示要被添加单聊免打扰的用户名数组

**示例：**

```php
# 用户 'jiguang' 添加对用户 'username0' 和 'username1' 的单聊免打扰

$touser = 'jiguang';
$usernames = ['username0', 'username1'];

$response = $user->addSingleNodisturb($touser, $usernames);
```

### 移除单聊免打扰

```php
$user->removeSingleNodisturb($touser, array $usernames);
```

**参数：**

> $touser: 表示要设置免打扰的当前用户

> $usernames: 表示要被移除单聊免打扰的用户名数组

**示例：**

```php
# 用户 'jiguang' 移除对用户 'username0' 和 'username1' 的单聊免打扰

$touser = 'jiguang';
$usernames = ['username0', 'username1'];

$response = $user->removeSingleNodisturb($touser, $usernames);
```

### 添加群聊免打扰

```php
$user->addGroupNodisturb($touser, array $gids);
```

**参数：**

> $touser: 表示要被设置免打扰的当前用户

> $gids: 表示要被添加群聊免打扰的群组的 gid 数组

**示例：**

```php
# 用户 'jiguang' 添加对群组 'gid0' 和 'gid1' 的群聊免打扰
$touser = 'jiguang';
$gid = ['gid0', 'gid1'];
$response = $user->addGroupNodisturb($touser, $gids);
```

### 移除群聊免打扰

```php
$user->removeGroupNodisturb($touser, array $gids);
```

**参数：**

> $touser: 表示要设置免打扰的当前用户

> $gids: 表示要被移除群聊免打扰的群组的 gid 数组

**示例：**

```php
# 用户 'jiguang' 移除对群组 'gid0' 和 'gid1' 的群聊免打扰
$touser = 'jiguang';
$gid = ['gid0', 'gid1'];
$response = $user->removeGroupNodisturb($touser, $gids);
```

### 开启全局免打扰

```php
$user->openGlobalNodisturb($touser);
```

**参数：**

> $touser: 表示要开启全局免打扰的用户

**示例：**

```php
# 用户 'jiguang' 开启全局免打扰
$touser = 'jiguang';
$response = $user->openGlobalNodisturb($touser);
```

### 关闭全局免打扰

```php
$user->closeGlobalNodisturb($touser);
```

**参数：**

> $touser: 表示要关闭全局免打扰的用户

**示例：**

```php
# 用户 'jiguang' 关闭全局免打扰
$touser = 'jiguang';
$response = $user->closeGlobalNodisturb($touser);
```

### 自定义免打扰

> 自定义免打扰的设置参数比较复杂，建议使用上面所述的 6 个方法设置免打扰

```php
$user->nodisturb($touser, array $options);
```

**参数：**

> $touser: 表示要设置自定义免打扰的用户

> $options: 自定义免打扰设置项数组

**示例：**

```php
# 自定义用户 'jiguang' 的免打扰设置
# 添加用户 $user0 和 $user1 的单聊免打扰，移除用户 $user2 和 $user3 的单聊免打扰
# 添加群组 $gid0 和 $gid1 的群聊免打扰，移除群组 $gid2 和 $gid3 的群聊免打扰
# 关闭全局免打扰

$username = 'jiguang';
$options = [
    "single" => [
        "add"    => [$user0, $user1],
        "remove" => [$user2, $user3]
    ],
    "group" => [
        "add"    => [$gid0, $gid1],
        "remove" => [$gid2, $gid3]
    ],
    "global" => 0
];

$response = $user->nodisturb($touser, $options);
```

## Admin 管理员

```php
use JMessage\IM\Admin;

$admin = new Admin($client);
```

### 管理员注册

```php
$admin->register(array $info);
```

**参数：**

> $info: 表示想要注册的管理员信息

**示例：**

```php
$info = [
    'username' => 'admin',
    'password' => 'password'
];
$response = $admin->register($info);
```

### 获取应用管理员列表

```php
$admin->listAll($count, $start = 0);
```

**参数：**

> $start: 起始记录位置 从 0 开始

> $count: 查询条数 最多支持 500 条

**示例：**

```php
# 获取从编号 2 开始的 10 个记录的管理员 admin 列表
$response = $admin->listAll(10, 2);
```

## Blacklist 黑名单

```php
use JMessage\IM\Blacklist;

$blacklist = new Blacklist($client);
```

### 黑名单列表

```php
$blacklist->listAll($user);
```

**参数：**

> $user：表示当前用户

**示例：**

```php
# 获取当前用户 'jiguang' 的黑名单列表
$user = 'jiguang';
$response = $blacklist->listAll($user);
```

### 添加黑名单

```php
$blacklist->add($user, array $usernames);
```

**参数：**

> $user：表示当前用户

> $usernames：表示要加入到当前用户黑名单中的用户名数组

**示例：**

```php
# 把用户 'username0' 和 'username1' 添加到 'jiguang' 的黑名单中
$user = 'jiguang';
$username = ['username0', 'username1'];

$response = $blacklist->add($user. $username);
```

### 移除黑名单

```php
$blacklist->remove($user, array $usernames);
```
**参数：**

> $user：表示当前用户

> $usernames：表示要从当前用户的黑名单中移除的用户名数组

**示例：**

```php
# 把用户 'username0' 和 'username1' 从 'jiguang' 的黑名单中移除
$user = 'jiguang';
$username = ['username0', 'username1'];

$response = $blacklist->remove($user， $username);
```

## Group 群组

```php
use JMessage\IM\Group;

$group = new Group($client);
```

### 创建群组

```php
$group->create($owner, $name, $desc, array $members = [])
```

**参数：**

> $owner: 表示群主的用名

> $name: 表示群组的名字

> $desc: 表示群组描述

> $members: 表示群组成员的用户名数组

**示例：**

```php
# 创建一个群名为 'jiguang group' 群主为 'jiguang' 的群

$owner = 'jiguang';
$members = ['username0', 'username1'];
$name = 'jiguang';
$desc 'jiguang group for developer';

$response = $group->create($owner, $name, $desc, $members);
```

### 获取群组详情

```php
$group->show($gid);
```

**参数：**

> $gid:  群组 ID, 由创建群组时分配

**示例：**

```php
# 获取群组 ID 为 12345 的群组的详情

$gid = 12345;
$response = $group->show($gid);
```

### 更新群组信息（群名 or 群描述）

```php
$group->update($gid, $name, $desc)
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

> $name: 新的群名

> $desc: 新的群描述

**示例：**

```php
$gid = 12345;
$name = 'new name';
$desc = 'new desc';

# 只更新群组 ID 为 12345 的群组的群名
$response = $group->update($gid, $name);

# 只更新群组 ID 为 12345 的群组的群描述
$response = $group->update($gid, null, $desc);

# 更新群组 ID 为 12345 的群组的群名和群描述
$response = $group->update($gid, $name, $desc);
```

### 删除群组

```php
$group->delete($gid);
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

**示例：**

```php
# 删除群组 ID 为 12345 的群组

$gid = 12345;
$response = $group->delete($gid);
```

### 更新群组成员

#### 添加群组成员

```php
$response = $group->addMembers($gid, array $usernames);
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

> $usernames: 表示要添加到群组的用户数组

**示例：**

```php
# 添加用户 'username0', 'username1' 到群组 ID 为 12345 的群组

$gid = 12345;
$usernames = ['username0', 'username1'];
$response = $group->addMembers($gid, $usernames);
```

#### 移除群组成员

```php
$group->removeMembers($gid, array $usernames);
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

> $usernames: 表示要从群组中移除的用户数组

**示例：**

```php
# 把用户 'username0', 'username1' 从群组 ID 为 12345 的群组中移除

$gid = 12345;
$usernames = ['username0', 'username1'];

$response = $group->removeMembers($gid, $usernames);
```

#### 更新群组成员

> 建议使用上面所述的 2 个方法分别添加和移除群组成员。

```php
$group->updateMembers($gid, array $options)
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

> $options: 表示更新群组选项

**示例：**

```php
# 添加用户 'username0', 'username1' 到群组 ID 为 12345 的群组, 同时把用户 'username2', 'username3' 从群组 ID 为 12345 的群组中移除

$gid = 12345;
$add = ['username0', 'username1'];
$remove = ['username2', 'username3'];

$response = $group->updateMembers($gid, [ 'add' => $add, 'remove' => $remove ]);
```

### 获取群组成员列表

```php
$group->members($gid);
```

**参数：**

> $gid: 群组 ID, 由创建群组时分配

**示例：**

```php
# 获取群组 ID 为 12345 的群组的成员列表

$gid = 12345;

$response = $group->members($gid);
```

### 获取当前应用的群组列表

```php
$group->listAll($count, $start = 0);
```

**参数：**

$start: 开始的记录数

$count: 本次读取的记录数量，最大值为500

**示例：**

```php
# 获取从编号 2 开始的 100 个记录的群组列表
$response = $group->listAll(100, 2);
```

## Friend 好友

```php
use JMessage\IM\Friend;

$friend = new Friend($client);
```

### 获取好友列表

```php
$friend->listAll($user);
```

**参数：**

> $user: 表示要获取其好友列表的用户

**示例：**

```php
# 获取用户 'jiguang' 的好友列表

$user = 'jiguang';

$response = $friend->listAll($user);
```

### 添加好友

```php
$friend->add($user, array $friends);
```

**参数：**

> $user: 表示要添加好友的用户

> $friends: 表示要被添加到好友列表的用户数组

**示例：**

```php
# 用户 'jiguang' 把用户 'username0', 'username1' 添加为好友

$user = 'jiguang';
$friends = ['username0', 'username1'];

$response = $friend->add($user, $friends);
```

### 删除好友

```php
$friend->remove($user, array $friends);
```

**参数：**

> $user: 表示要移除好友的用户

> $friends: 表示要被从好友列表移除的用户数组


**示例：**

```php
# 用户 'jiguang' 删除好友 'username0', 'username1'

$user = 'jiguang';
$friends = ['username0', 'username1'];

$response = $friend->remove($user, $friends);
```

### 更新好友备注

```php
$group->updateNotename($user, array $options);
```

**参数：**

> $user: 表示要更新好友备注的用户

> $options: 表示更新好友备注的选项数组

**示例：**

```php
# 用户 'jiguang' 更新好友 'username0', 'username1' 的好友备注

$user = 'jiguang';
$options = [
    [
        'username' => 'username0',
        'note_name' => 'username0_alias',
        'others' => 'good friend'
    ], [
        'username' => 'username1',
        'note_name' => 'username1_alias',
        'others' => 'normal friend'
    ]
];

$response = $friend->updateNotename($user, $options);
```

## Resource 媒体资源

```php
use JMessage\IM\Resourse;

$resource = new Resource($client);
```

### 资源上传

```php
$resource->upload($type, $path);
```

**参数：**

> $type: 表示要上传的资源类型，仅支持 'image' 和 'file' 两种资源

> $path: 表示要上传的资源的全路径

**示例：**

```php
$path = '/home/user/www/jiguang.png';

# 把图片 'jiguang.png' 作为图片上传
$response = $resource->upload('image', $path);

# 把图片 'jiguang.png' 作为文件上传
$response = $resource->upload('file', $path);
```

### 资源下载

```php
$resource->download($mediaId);
```

**参数：**

> $mediaId: 表示资源的 mediaId，包括用户的 avatar 字段，资源上传之后返回

**示例：**

```php
$mediaId = 'xxxx';

$response = $resource->download($mediaId);
```

## 发送消息

```php
use JMessage\IM\Message;

$message = new Message($client);
```

### 发送文本消息

```php
$message->sendText($version, array $from, array $target, array $msg, array $notification = [], array $options = []);
```

**参数：**

> $version: 版本号

> $from: 发送者信息数组

> $target: 接受者信息数组

> $msg: 消息体数组

> $notification: 自定义通知数组

> $options: 其他选项数组

**发送者信息数组 $from 说明：**

 键 | 是否必须 | 含义
 --- | --- | ---
 type | 是 | 发送消息者身份 当前只限 admin 用户，必须先注册 admin 用户
 id | 是 | 发送者的用户名
 name | 否 | 发送者展示名

**接受者信息数组 $target 说明：**

 键 | 是否必须 | 含义
 --- | --- | ---
 type | 是 | 发送目标类型， 'single' - 个人，'group' - 群组
 id | 是 | 目标 id， 'single' 填 username 'group' 填 Group Id
 name | 否 | 接受者展示名

**消息体数组 $msg 说明：**

 键 | 是否必须 | 含义
 --- | --- | ---
 text | 是 | 消息内容
 extras | 否 | 接受一个自定义键值对数组

 **自定义通知栏展示数组 $notification 说明**

 键 | 是否必须 | 含义
 --- | --- | ---
 notifiable | 否 | 消息是否在通知栏展示 true 或者 false，默认为 true，表示在通知栏展示
 title | 否 | 通知的标题
 alert | 否 | 通知的内容

**其他选项数组 $options 说明**

 键 | 是否必须 | 含义
 --- | --- | ---
 offline | 否 | 消息是否离线存储 true 或者 false，默认为 true，表示需要离线存储

### 发送图片消息

```php
$message->sendImage($version, array $from, array $target, array $msg, array $notification = [], array $options = []);
```

**参数：**

> $version: 版本号，目前是 1

> $from: 发送者信息数组（说明同上）

> $target: 接受者信息数组（说明同上）

> $msg: 消息体数组

> $notification: 自定义通知栏展示数组（说明同上）

> $options: 其他选项数组（说明同上）

**消息体数组 $msg 说明：**

 键 | 是否必须 | 含义
 --- | --- | ---
 media_id | 是 | 文件上传之后服务器端所返回的 key，用于之后生成下载的 url
 media_crc32 | 是 | 文件的 crc32 校验码，用于下载大图的校验
 width | 是 | 图片原始宽度
 height | 是 | 图片原始高度
 format | 是 | 图片格式
 fsize | 是 | 文件大小（字节数）

 ### 发送语音消息

```php
$message->sendVoice($version, array $from, array $target, array $msg, array $notification = [], array $options = []);
```

**参数：**

> $version: 版本号，目前是1

> $from: 发送者信息数组（说明同上）

> $target: 接受者信息数组（说明同上）

> $msg: 消息体数组

> $notification: 自定义通知栏展示数组（说明同上）

> $options: 其他选项数组（说明同上）

**消息体数组 $msg 说明：**

 键 | 是否必须 | 含义
 --- | --- | ---
 media_id | 是 | 文件上传之后服务器端所返回的 key，用于之后生成下载的 url
 media_crc32 | 是 | 文件的 crc32 校验码
 duration | 是 |  音频时长
 hash | 是 | 音频 hash 值
 fsize | 是 | 文件大小（字节数）

### 发送自定义消息

```php
$message->sendCustom($version, array $from, array $target, array $msg, array $notification = [], array $options = []);
```

**参数：**

> $version: 版本号

> $from: 发送者信息数组（说明同上）

> $target: 接受者信息数组（说明同上）

> $msg: 消息体数组，接受一个自定义键值对数组

> $notification: 自定义通知栏展示数组（说明同上）

> $options: 其他选项数组（说明同上）

### 消息撤回

```php
$message->retract($msgid, $username);
```

**参数：**

> $msgid: 消息的 msgid

> $username: 发送此消息的用户名

## SensitiveWord 敏感词

```php
use JMessage\IM\SensitiveWord;

$sensitiveWord = new SensitiveWord($client);
```

### 获取敏感词列表

```php
$sensitiveWord->listAll($count, $start = 0);
```

**参数：**

> $start：起始记录位置 从 0 开始

> $count：查询条数，最多 2000

**示例：**

```php
# 获取从编号 2 开始的 10 个记录的敏感词列表
$response = $sensitiveword->listAll(10, 2);
```

### 添加敏感词

```php
$sensitiveWord->add(array $words);
```

**参数：**

> $words：表示敏感词数组 一个词长度最多为 10，默认最多支持 100 个敏感词

**示例：**

```php
# 将敏感词 'f0'、'f1' 添加到敏感词列表
$words = ['f0', 'f1'];
$response = $sensitiveword->add($words);
```

### 删除敏感词

```php
$sensitiveWord->delete($word);
```

**参数：**

> $word: 表示要被删除的敏感词

**示例：**

```php
# 将敏感词 'f0' 从敏感词列表删除
$words = 'f0';
$response = $sensitiveword->delete($words);
```

### 修改敏感词

```php
$sensitiveWord->update($old, $new);
```

**参数：**

> $old: 表示旧敏感词

> $new: 表示新敏感词

**示例：**

```php
# 将敏感词 'f0' 修改为　'f1'
$response = $sensitiveword->update('f0', 'f1');
```

### 获取敏感词功能状态

```php
$sensitiveWord->getStatus();
```

### 更新敏感词功能状态

```php
$sensitiveWord->updateStatus(bool $opened);
```

**参数：**

> $opened： 表示敏感词开关状态， true 表示开启过滤， false 表示关闭过滤

**示例：**

```php
# 关闭敏感词过滤
$opened = false;
$response = $sensitiveword->updateStatus($opened);
```
