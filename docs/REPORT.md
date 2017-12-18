# Report

```php
use JMessage\IM\Report;
$report = new Report($jm);
```

## 获取消息

```php
$report->getMessages($count, $beginTime, $endTime)
$report->getNextMessages($cursor)
```

**参数：**

> $count: 每次查询的总条数 一次最多 1000

> $beginTime: 记录开始时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件大于等于 $beginTime

> $endTime: 记录结束时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件下于等于 $endTime, $beginTime $endTime 之间最大范围不得超过 7 天

> $cursor: 当第一次请求后如果后面有数据，会返回一个cursor回来用这个获取接下来的消息

**示例：**

```php
$response = $report->getMessages(100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');

$cursor = 'xxxx';
$response = $report->getNextMessages($cursor);
```

## 获取用户消息

```php
$report->getUserMessages($username, $count, $beginTime, $endTime)
$report->getNextUserMessages($username, $cursor)
```

**参数：**

> $username: 表示想要获取其用户消息的用户名

> $count: 每次查询的总条数 一次最多 1000

> $beginTime: 记录开始时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件大于等于 $beginTime

> $endTime: 记录结束时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件下于等于 $endTime, $beginTime $endTime 之间最大范围不得超过 7 天

> $cursor: 当第一次请求后如果后面有数据，会返回一个cursor回来用这个获取接下来的消息

**示例：**

```php
$response = $report->getUserMessages('user_0', 100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');

$cursor = 'xxxx';
$response = $report->getNextUserMessages('user_0', $cursor);
```

## 获取群组消息

```php
$report->getGroupMessages($gid, $count, $beginTime, $endTime)
$report->getNextGroupMessages($gid, $cursor)
```

**参数：**

> $gid: 表示想要获取其群组消息的 gid

> $count: 每次查询的总条数 一次最多 1000

> $beginTime: 记录开始时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件大于等于 $beginTime

> $endTime: 记录结束时间 格式 yyyy-MM-dd HH:mm:ss 设置筛选条件下于等于 $endTime, $beginTime $endTime 之间最大范围不得超过 7 天

> $cursor: 当第一次请求后如果后面有数据，会返回一个cursor回来用这个获取接下来的消息

**示例：**

```php
$gid = 'xxxx';

$response = $report->getGroupMessages($gid, 100, '2017-12-10 10:10:10', '2017-12-17 10:10:10');

$cursor = 'xxxx';
$response = $report->getNextGroupMessages($gid, $cursor);
```

## 用户统计

```php
$report->users($timeUnit, $start, $duration);
```

**参数：**

> $timeUnit: 查询维度,目前只有 DAY

> $start: 开始时间 timeUnit 为 DAY 的时候格式为 yyyy-MM-dd

> $duration: 请求时的持续时长，DAY 最大为 60 天

**示例：**

```php
$response = $report->users('DAY', 2017-12-01, 6);
```

## 消息统计

```php
$report->messages($timeUnit, $start, $duration);
```

**参数：**

> $timeUnit: 查询维度，目前有 HOUR DAY MONTH 三个维度可以选

> $start: 开始时间  timeUnit 为 HOUR 时 格式为 yyyy-MM-dd HH，DAY 的时候格式为yyyy-MM-dd，MONTH 的时候格式为 yyyy-MM

> $duration: 请求时的持续时长，HOUR 只支持查询当天的统计， DAY 最大为 60 天 ，MOTH 为两个月

**示例：**

```php
$response = $report->messages('DAY', 2017-12-01, 6);
```

## 群组统计

```php
$report->groups($timeUnit, $start, $duration);
```

**参数：**

> $timeUnit: 查询维度,目前只有 DAY

> $start: 开始时间 timeUnit 为 DAY 的时候格式为 yyyy-MM-dd

> $duration: 请求时的持续时长，DAY 最大为 60 天


**示例：**

```php
$response = $report->groups('DAY', 2017-12-01, 6);
```
