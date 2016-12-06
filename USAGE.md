# GUIDES

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

#### 注册用户

批量注册用户到极光 IM 服务器，一次批量注册最多支持 500 个用户。

```php
$user->register(array $users);
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
$response = $user->register($users);
```

#### 获取用户列表

```php
$user->list($start, $count);
```

**参数：**

> $start: 开始的记录数

> $count: 要获取的记录个数

**示例：**

```php
# 获取从编号 2 开始的 100 个记录的用户列表
$response = $user->list(2, 100);
```

#### 获取用户信息

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

#### 更新用户信息

```php
$user->update($username, array $options);
```

**参数：**

> $username: 表示想要更新其信息的用户的用户名

> $options: 更新选项数组，表示需要更新的用户信息和值。支持 **nickname**、**avatar**、**birthday**、**signature**、**gender**、**region**、**address** 中的一个或多个

| 参数 | 意义 | 说明 |
| -- | -- | -- |
| nickname | （选填）用户昵称 | 不支持的字符：英文字符： \n \r\n |
| avatar | （选填）头像 | 需要填上从文件上传接口获得的 media_id |
| birthday | （选填）生日 | example: 1990-01-24 yyyy-MM-dd |
| signature |（选填）签名 | 支持的字符：全部，包括 Emoji |
| gender | （选填） 性别 | 0 - 未知， 1 - 男 ，2 - 女 |
| region | （选填）地区 | 支持的字符：全部，包括 Emoji |
| address | （选填）地址 | 支持的字符：全部，包括 Emoji |

**示例：**

```php
# 更新用户名为 'jiguang' 的用户的 niackname 和 gender

$username = 'jiguang';
$nickname = 'jpush';

$response = $user->update($username, ['nickname' => $nickname， 'gender' => 2]);
```

#### 查询用户在线状态

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

#### 修改密码

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

#### 删除用户

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

#### 添加单聊免打扰

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

#### 移除单聊免打扰

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

#### 添加群聊免打扰

```php
$user->addGroupNodisturb($touser, array $gids);
```

**参数：**

> $touser: 表示要被设置免打扰的当前用户

> $gids: 表示要被添加群聊免打扰的群组的 gid 数组

**示例：**

```php
# TODO
$touser = 'jiguang';
$response = $user->addGroupNodisturb($touser, $gids);
```

#### 移除群聊免打扰

```php
$user->removeGroupNodisturb($touser, array $gids);
```

**参数：**

> $touser: 表示要设置免打扰的当前用户

> $gids: 表示要被移除群聊免打扰的群组的 gid 数组

**示例：**

```php
# TODO
$touser = 'jiguang';
$response = $user->addGroupNodisturb($touser, $gids);
```

#### 开启全局免打扰

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

#### 关闭全局免打扰

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

#### 自定义免打扰

> 自定义免打扰的设置比较复杂，建议使用上面所述的 6 种方式设置免打扰。

```php
$user->nodisturb($touser, array $options);
```

**参数：**

> $touser: 表示要设置自定义免打扰的用户

> $options: 自定义免打扰设置项数组

**示例：**

```php
$username = 'jiguang';
$options = [
    "single" => [
        "add" => [],
        "remove" => [],
    ],
    "group" => [
        "add" => [],
        "remove" => [],
    ],
];

$response = $user->nodisturb($touser, $options);
```

## Admin 管理员

```php
use JMessage\IM\Admin;

$admin = new Admin($client);
```

#### 管理员注册

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

#### 获取应用管理员列表

```php
$admin->list($start, $count);
```

**参数：**

> $start: 起始记录位置 从 0 开始

> $count: 查询条数 最多支持 500 条

**示例：**

```php
# 获取从编号 2 开始的 10 个记录的管理员 admin 列表
$response = $admin->list(2, 10);
```

## Blacklist 黑名单

```php
use JMessage\IM\Blacklist;

$blacklist = new Blacklist($client);
```

#### 黑名单列表

```php
$blacklist->list($user);
```

**参数：**

> $user：表示当前用户

**示例：**

```php
# 获取当前用户 'jiguang' 的黑名单列表
$user = 'jiguang';
$response = $blacklist->list($user);
```

#### 添加黑名单

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

#### 移除黑名单

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
