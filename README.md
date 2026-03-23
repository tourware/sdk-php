# tourware PHP SDK 🚀  
**Official PHP client for the tourware REST API**

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tourware/sdk-php.svg?style=flat-square)](https://packagist.org/packages/tourware/sdk-php)  
[![Total Downloads](https://img.shields.io/packagist/dt/tourware/sdk-php.svg?style=flat-square)](https://packagist.org/packages/tourware/sdk-php)  
[![License: MIT](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](./LICENSE)

The **tourware PHP SDK** provides a clean, consistent, and extensible PHP interface to the tourware REST API.  
It simplifies authentication, querying, filtering, pagination, and interaction with all tourware resources such as Travels, Bookings, Customers, and more.

The SDK is designed for **modern PHP applications**, including Laravel and Symfony, but works with any PSR-4 compatible project.

---

## 📦 Installation

Install via Composer:

```bash
composer require tourware/sdk-php
```

Load the package:

```php
require 'vendor/autoload.php';
```

---

## 🚀 Quick Start

```php
use tourware\Client;

// Create a client for the flowcore API (staging by default)
$client = Client::create(
    xApiKey: 'YOUR_X_API_KEY'
);

// Production:
$prodClient = Client::create(
    xApiKey: 'YOUR_X_API_KEY',
    staging: false
);

// Example: Fetch a travel record
$travel = $client->travels()->find('60feacb365f5f1002750c2b2');
```

---

## 🧭 Working With Entities

Each API resource has a dedicated client.

### Accessing entities:

```php
$client->travel()->find('id');
$client->booking()->list();
$client->customer()->create([...]);
```

### Using entity classes:

```php
use tourware\Entities\Travel;

$travel = $client->entity(new Travel)->find('id');
```

### Raw access:

```php
$travel = $client->raw('travels')->find('id');
```

---

## 🔍 Query Builder

The SDK includes a fluent query builder.

```php
$travels = $client
    ->travel()
    ->query()
    ->filter('title')->contains('Kenya')
    ->filter('price.adult')->gte(1500)
    ->sort('updatedAt')->desc()
    ->offset(0)
    ->limit(20)
    ->get();
```

### Dot-notation access:

```php
$title = $travels->get('records.0.title');
$firstName = $travels->get('records.0.responsibleUser.firstname');
```

---

## 💥 CRUD Operations

### Create
```php
$client->travel()->create([
    'title' => 'New Travel Package',
]);
```

### Read
```php
$client->travel()->find('id');
```

### Update
```php
$client->travel()->update('id', [
    'title' => 'Updated Title',
]);
```

### Delete
```php
$client->travel()->delete('id');
```

### List
```php
$client->travel()->list(offset: 0, limit: 50);
```

---

## ⚙️ Custom Requests

```php
$response = $client
    ->custom("/relations/getRelations/travels/bba0b42e4699", method: 'GET')
    ->call();
```

---

## 🛡️ Error Handling

```php
try {
    $travel = $client->travel()->find('id');
} catch (\tourware\Exceptions\ApiException $e) {
    echo "API Error: " . $e->getMessage();
} catch (\Exception $e) {
    echo "General Error: " . $e->getMessage();
}
```

---

## 🧪 Testing

```bash
composer test
```

---

## 🎯 Best Practices

- Store API keys in environment variables  
- Prefer Query Builder over raw endpoints  
- Wrap API calls in `try/catch`  
- Log API requests and responses  
- Keep SDK updated regularly  

---

## 🤝 Contributing

Contributions are welcome!  
Please check the `CONTRIBUTING.md` and `CODE_OF_CONDUCT.md` before submitting a PR.

---

## 🔒 Security

If you discover a security vulnerability, please email:

**security@tourware.com**

Do not create public issues for security topics.

---

## 📜 Changelog

See:  
[CHANGELOG.md](./CHANGELOG.md)

---

## 🧑‍💻 Maintainers & Credits

- Official maintainers from tourware  
- Community contributors  

Licensed under **MIT License**.

---

## 🌟 Why Use This SDK?

- Clean & intuitive API  
- Fully PSR-4 compliant  
- Flexible Query Builder  
- Supports all tourware endpoints  
- Ideal for Laravel, Symfony & general PHP apps  
- Built for tour operators, DMCs and travel platforms  

> “This SDK gives you a modern, stable, and scalable foundation for any tourware integration — from small tools to full enterprise platforms.”

---

## 🚀 Happy Coding!
