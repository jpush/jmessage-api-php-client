# Cross 跨应用


## JMessage Client

```php
use JMessage\JMessage;

$appKey = 'xxxx';
$masterSecret = 'xxxx';

$client = new JMessage($appKey, $masterSecret);
```

## 跨应用管理群组成员

```php
use JMessage\Cross\Member;

$member = new Member($client);
```

### 跨应用添加成员

```php
$member->add($gid, $appKey, array $usernames)
```

**参数：**

> $gid：表示要添加成员的群组 gid

> $appKey：表示用户所属的 appKey

> $usernames：表示要添加到群组的用户数组

**示例：**

```php
# 跨应用把 appKey 为 'xxxxxx' 的应用下的用户 'username0' 和 'username1' 添加到群组 gid 为 'xxxx' 的群组中

$gid = 'xxxx';
$appKey = 'xxxxxx';
$usernames = ['username0', 'username1'];

$response = $member->add($gid, $appKey, $usernames);
```

### 跨应用移除成员

```php
$member->remove($gid, $appKey, array $usernames);
```

**参数：**

> $gid：表示要移除成员的群组 gid

> $appKey：表示用户所属的 appKey

> $usernames：表示要从群组移除的用户数组

**示例：**

```php
# 跨应用从群组 gid 为 'xxxx' 的群组中把 appKey 为 'xxxxxx' 的应用下的用户 'username0' 和 'username1' 移除

$gid = 'xxxx';
$appKey = 'xxxxxx';
$usernames = ['username0', 'username1'];

$response = $member->remove($gid, $appKey, $usernames);
```

### 跨应用更新群组成员

> 跨应用管理成员的设置参数比较复杂，建议使用上面所述的 2 个方法

```php
$member->update($gid, array $options);
```

**参数：**

> $gid：表示要添加成员的群组 gid

> $options：表示批量添加成员的选项数组

**示例：**

```php
# 跨应用管理群组 'xxxx' 中的成员

$gid = 'xxxx';


$appKey0 => 'appkey_0';
$add0 = ['username0', 'username1'];
$remove0 = ['username2', 'username3'];

$appKey1 = 'appkey_1';
$add1 = ['username4', 'username5'];
$remove1 = ['username6', 'username7'];

$options0 = [
    [
        'appKey' => $appKey0,
        'add' => $add0,
        'remove' => $remove0
    ],[
        'appKey' => $appKey1,
        'add' => $add1,
        'remove' => $remove1]
];

# or

$options1 = [
    [
        'appKey' => 'appkey_0',
        'add' => ['username0', 'username1'],
        'remove' => ['username2', 'username3']
    ], [
        'appKey' => 'appkey_1',
        'add' => ['username4', 'username5'],
        'remove' => ['username6', 'username7']
    ]
];

$response = $member->update($gid, $options1);
```

### 跨应用获取群组成员列表

```php
$member->list($gid);
```

**参数：**

> $gid：表示群组 gid

**示例：**

```php
# 跨应用获取群组 gid 为 'xxxx' 的群组的成员列表

$gid = 'xxxx';

$response = $member->list($gid);
```

## 跨应用管理黑名单

```php
use JMessage\Cross\Blacklist;

$blacklist = new Blacklist($client);
```

### 跨应用获取黑名单列表

```php
$blacklist->list($user);
```

**参数：**

> $user：表示要跨应用获取其黑名单列表的用户

**示例：**

```php
# 跨应用获取用户 'jiguang' 的黑名单列表

$user = 'jiguang';

$response = $blacklist->list($user);
```

### 跨应用添加黑名单

```php
$blacklist->add($user, $appKey, array $usernames);
```

**参数：**

> $user：表示要跨应用管理其黑名单的用户

> $appKey：表示用户所属的 appKey

> $usernames：表示要添加进黑名单的用户的数组

**示例：**

```php
# 跨应用把用户 'username0' 和 'username1' 添加到用户 'jiguang' 的黑名单列表中

$user = 'jiguang';
$appKey = 'xxxxxx';
$username = ['username0', 'username1'];

$response = $blacklist->add($user, $appKey, $usernames);
```

### 跨应用移除黑名单

```php
$blacklist->remove($user, $appKey, array $usernames);
```

**参数：**

> $user：表示要跨应用管理其黑名单的用户

> $appKey：表示用户所属的 appKey

> $usernames：表示要从黑名单移除的用户的数组

**示例：**

```php
# 跨应用把用户 'username0' 和 'username1' 从用户 'jiguang' 的黑名单列表中移除

$user = 'jiguang';
$appKey = 'xxxxxx';
$username = ['username0', 'username1'];

$response = $blacklist->remove($user, $appKey, $usernames);
```

### 跨应用批量添加黑名单

```php
$blacklist->patchAdd($user, array $options);
```

**参数：**

> $user：表示要跨应用批量管理其黑名单的用户

> $options：表示跨应用批量添加黑名单的选项数组

**示例：**

```php
# 跨应用把应用 ‘appKey0’ 中的用户 'username0' 和 'username1' 以及应用 ‘appKey1’ 中的用户 'username2' 和 'username3' 添加到用户 'jiguang' 的黑名单列表中

$user = 'jiguang';

$options = [
        'appKey' => 'appKey0',
        'usernames' => ['username0', 'username1']
    ],[
        'appKey' => 'appKey1',
        'usernames' => ['username2', 'username3']
];

$response = $blacklist->add($user, $options);
```

### 跨应用批量移除黑名单

```php
$blacklist->patchRemove($user, array $options);
```

**参数：**

> $user：表示要跨应用批量管理其黑名单的用户

> $options：表示跨应用批量移除黑名单的选项数组


**示例：**

```php
# 跨应用把应用 ‘appKey0’ 中的用户 'username0' 和 'username1' 以及应用 ‘appKey1’ 中的用户 'username2' 和 'username3' 从用户 'jiguang' 的黑名单列表中移除

$user = 'jiguang';

$options = [
        'appKey' => 'appKey0',
        'usernames' => ['username0', 'username1']
    ],[
        'appKey' => 'appKey1',
        'usernames' => ['username2', 'username3']
];

$response = $blacklist->patchRemove($user, $options);
```

## 跨应用免打扰设置

```php
use JMessage\Cross\Nodisturb;

$nodisturb = new Nodisturb($client);
```

### 跨应用单聊免打扰设置

```php
$nodisturb->single($user, $appKey, array $options);
```

**参数：**

> $user：表示要设置跨应用单聊免打扰的用户

> $appKey：表示用户所属的 appKey

> $options：表示设置跨应用单聊免打扰的选项数组，支持键名 'add' 或 'remove' 表示添加或移除

**示例：**

```php
$user = 'jiguang';
$appKey = 'xxxxxx';
$add = ['username0', 'username1'];
$remove = ['username2', 'username3'];
$options = ['add' => $add, 'remove' => $remove ];

# 用户 'jiguang' 跨应用对 'xxxxxx' 应用下的用户 'username0', 'username1' 添加单聊免打扰，且同时对 'username2', 'username3' 移除单聊免打扰
$response = $nodisturb->single($user, $appKey, ['add' => $add, 'remove' => $remove ]);

# 用户 'jiguang' 跨应用仅对 'xxxxxx' 应用下的用户 'username0', 'username1' 添加单聊免打扰
$response = $nodisturb->single($user, $appKey, ['add' => $add]);

# 用户 'jiguang' 跨应用仅对 'xxxxxx' 应用下的用户 'username2', 'username3' 移除单聊免打扰
$response = $nodisturb->single($user, $appKey, ['remove' => $remove ]);
```

### 跨应用群聊免打扰设置

```php
$nodisturb->group($user, $appKey, array $options);
```

**参数：**

> $user：表示要设置跨应用群聊免打扰的用户

> $appKey：表示群组所属的 appKey

> $options：表示设置跨应用群聊免打扰的选项数组，支持键名 'add' 或 'remove' 表示添加或移除

**示例：**

```php
# 用户 'jiguang' 跨应用对 'xxxxxx' 应用下的群组 'gid0', 'gid1' 添加群聊免打扰，且同时对 'gid2', 'gid3' 移除群聊免打扰

$user = 'jiguang';
$appKey = 'xxxxxx';
$options = [
    'add' => ['gid0', 'gid1'],
    'remove' =>['gid2', 'gid3']
]
$response = $nodisturb->group($user, $appKey, $options);
```
