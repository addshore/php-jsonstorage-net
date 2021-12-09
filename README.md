# PHP-JSONSTORAGE-NET

https://www.jsonstorage.net/ provides a simple JSON storage, with a free tier that can be very useful for small persoanl projects.

This PHP library is a tiny wrapper around their API allowing you to get and put JSON data using their service.

All you need is an account (you can log in with a Google account), and an API key.

## Without API key

Create, get, update, and delete JSON objects.

```php
<?php

use Addshore\JsonStorageNet\JsonStorageNetClient;

require_once __DIR__ . '/vendor/autoload.php';

$store = new JsonStorageNetClient();

// Create
$id = $store->create(['foo' => 'bar']);
var_dump($id);

// GET
var_dump($store->get($id));

// PUT
$store->put($id, ['foo' => 'baz']);
var_dump($store->get($id));

// DELETE
$store->delete($id);
```

## With API key

Get and update private JSON objects created using the app.

https://app.jsonstorage.net/

```php
<?php

use Addshore\JsonStorageNet\JsonStorageNetClient;

require_once __DIR__ . '/vendor/autoload.php';

$store = new JsonStorageNetClient("482f7f97-036e-4332-a89a-gg6d19ty9dbi");
$id = "e4cbb4df-ee30-4e31-97a4-7e99180chhaa/b8cb258e-9d22-8959-a3e3-91a28edce82f";

// GET
var_dump($store->get($id));

// PUT
$store->put($id, ['foo' => 'baz']);
var_dump($store->get($id));
```