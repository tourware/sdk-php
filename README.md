# Tourware API SDK

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github]][link-github]
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
$client = Client::create(xApiKey: 'xxxxxxx'); // For staging

$client = Client::create(xApiKey: 'xxxxxxx', staging: false); // For production

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

[ico-version]: https://img.shields.io/packagist/v/tourware/sdk-php.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-github]: https://img.shields.io/github/workflow/status/tourware/sdk-php/tests/master
[ico-downloads]: https://img.shields.io/packagist/dt/tourware/sdk-php.svg

[link-packagist]: https://packagist.org/packages/tourware/sdk-php
[link-github]: https://github.com/tourware/sdk-php/actions/workflows/tests.yml
[link-downloads]: https://packagist.org/packages/tourware/sdk-php
[link-author]: https://github.com/tourware
[link-contributors]: ../../contributors
