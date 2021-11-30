# tourware© SDK PHP

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github]][link-github]
[![Total Downloads][ico-downloads]][link-downloads]

Official PHP client for the tourware© REST-API. Its goal is to provide common ground for all tourware©-related code in PHP.

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

### Entity Client
Each **Tourware** entity has it's own client, which is resposible for handling the
http operations. Each entity client is available to you, by using the `Tourware\Client`
facade.

For example there multiple ways of retrieving the client for the Travels
```php
use Tourware\Entities\Travel;

// By using helper method
$travel = $client->travel()->find();

// By using the entity class
$travel = $client->entity(new Travel)->find();

// Or by using the raw endpoint 
$travel = $client->raw('travels')->find();
```


### CRUD
You can perform CRUD operations on your records using the `Tourware\Client`.

```php

// Create a new travel
$response = $client->travel()->create([...]);

// Find a travel
$response = $client->travel()->find('bba0b42e4699');

// Update an existing travel
$response = $client->travel()->update('bba0b42e4699', [...]);

// List all travels
$response $client->travel()->list(offset: 0, limit: 50);

// List specific travel
$response = $client->travel()->delete('bba0b42e4699');

```


### Query

The query builder provides a variety of method helping you filter your entities.

#### Dot nottation
When your are retrieving your query results. You can access them by using
dot nottation.

Eg.:
```php
$travels = $client->travel()->query()->filter('title')->contains('kenya')->get();

//The the first name for the resposible user
$travels->get('records.0.responsibleUser.firstname');
```

#### Filter
Let's say that you wan't to filter your **travels** and get only records which contain the 
word "kenya".

You can accomplish this by using the query builder like bellow:
```php

use Tourware\Operator\Contains;

// By using the query builder
$travels = $client->travel()->query()->filter('title')->contains('kenya')->get();

// By using the filter class
$travels = $client->travel()->query()->addFilter(new Contains('title', 'kenya'))->get();

// By using raw filter
$client->travel()->query()->addRawFilter(['property' => 'title', 'operator' => 'contains', 'value' => 'kenya'])->get();
```

#### Sort
The query builder also allows you to sort the retrieved records.

```php

use Tourware\Orders\Asc;

// By using the sort builder
$travels = $client->travel()->query()->sort('id')->asc()->get();

// By using the sort class
$travels = $client->travel()->query()->addSort(new Asc('id'))->get();

// By using raw sort
$travels = $client->travel()->query()->addRawSort(['property' => 'id', 'direction' => 'asc'])->get();

```

#### Offset & Limit

It's a common case that you want to paginate your results. Therefore the query
builder also providers the `offset` and `limit` methods. 

Here's how you can retrive chunks of your travels
```php

$travels = $client->travel()->query()->offset(5)->limit(20)->get();

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
