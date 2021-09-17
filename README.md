# Tourware API SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

Official PHP client for the Tourware API. Its goal is to provide common ground for all Tourware-related code in PHP.

## Install

Via Composer

``` bash
$ composer require tourware/sdk-php
```

## Usage

You should always use Composer autoloader in your application to automatically load your dependencies. All the examples below assume you've already included this in your file:

``` php
use Tourware\Client;

require 'vendor/autoload.php';
```

Here's how to retrieve a **Travel** using the SDK:

```php
// First, instantiate the SDK with your x-api-key API credentials
$client = Client::create(xApiKey: 'xxxxxxx-xxxx-xxxx-xxxxx-xxxxxxxx'); // For staging

$client = Client::create(xApiKey: 'xxxxxxx-xxxx-xxxx-xxxxx-xxxxxxxx', staging: false); // For production

// Now, get a Travel by it's id 
$travel = $client->travels()->find('60feacb365f5f1002750c2b2');
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@tourware.com instead of using the issue tracker.

## Credits

- [Nico][link-author]
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tourware/sdk-php.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tourware/sdk-php/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tourware/sdk-php.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tourware/sdk-php.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tourware/sdk-php.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tourware/sdk-php
[link-travis]: https://travis-ci.org/tourware/sdk-php
[link-scrutinizer]: https://scrutinizer-ci.com/g/tourware/sdk-php/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tourware/sdk-php
[link-downloads]: https://packagist.org/packages/tourware/sdk-php
[link-author]: https://github.com/tourware
[link-contributors]: ../../contributors
