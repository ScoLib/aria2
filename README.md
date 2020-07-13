# Aria2 PHP Client

A Simple Aria2 JSON-RPC client.

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Total Downloads][ico-downloads]][link-downloads]


## 安装

Via Composer

``` bash
$ composer require scolib/aria2
```

## 使用

``` php
$client = new Sco\Aria2\Client();
$client->addUri($url);
$client->addTorrent($torrent);
$client->addMetalink($metalink);
```

## 感谢
https://github.com/nulastudio/Aria2

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/scolib/aria2.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/scolib/aria2/master.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/scolib/aria2.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/scolib/aria2
[link-travis]: https://travis-ci.com/scolib/aria2
[link-downloads]: https://packagist.org/packages/scolib/aria2
