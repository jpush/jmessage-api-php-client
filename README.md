# JMessage API PHP Client

这是 JMessage REST API 的 PHP 版本封装开发包，是由极光推送官方提供的，一般支持最新的 API 功能。

对应的 REST API 文档: https://docs.jiguang.cn/jmessage/server/rest_api_im/

## Installation

#### 使用 Composer 安装

- 在项目中的 `composer.json` 文件中添加 jpush 依赖：

```json
"require": {
    "jiguang/jmessage": "v0.0.1"
}
```

- 执行 `$ php composer.phar install` 或 `$ composer install` 进行安装。

#### 直接下载源码安装

> 直接下载源代码也是一种安装 SDK 的方法，不过因为有版本更新的维护问题，所以这种安装方式**十分不推荐**，但由于种种原因导致无法使用 Composer，所以我们也提供了这种情况下的备选方案。

- 下载源代码包，解压到项目中
- 在项目中引入 autoload：

```php
require 'path_to_sdk/autoload.php';
```

## Usage

## Examples


## Contributing

Bug reports and pull requests are welcome on GitHub at https://github.com/jpush/jmessage-api-php-client.

## License

The library is available as open source under the terms of the [MIT License](http://opensource.org/licenses/MIT).
