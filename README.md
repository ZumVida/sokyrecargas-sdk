# Sokyrecargas SDK

PHP client for the Sokyrecargas API

## Instalation

Install package via GitHub public repository.

First allow get package from GitHub by editing `composer.json`

```json
"repositories": [
    {
        "url": "https://github.com/ZumVida/sokyrecargas-sdk-php.git",
        "type": "git"
    }
]
```

Next install package

```shell
composer require sokyrecargas/sdk:dev-php-7.2
```

## Usage

### Init Client

```php
$sandboxBaseUrl = 'https://soky-api.dev.zumvida.com/api';
$productionBaseUrl = 'https://api.sokyrecargas.com/api';

// Create SDK instance
$sdk = new \Sokyrecargas\Client(
    apiKey: 'MY-SECRET-KEY',
    apiBaseUrl: $sandboxBaseUrl
); 
 ```

### Handle Request and Responses

```php
// Create SDK instance
$sdk = new \Sokyrecargas\Client(
    apiKey: 'MY-SECRET-KEY',
    apiBaseUrl: $sandboxBaseUrl
); 

/**
 * Response body as string 
 */
$offers = $sdk->offer()->list();

/**
 * Response body as array
 */
$offersArray = \Sokyrecargas\Client::getContent(
    $sdk->offer()->list()
);


```

## Links

[API Documentation](https://api.sokyrecargas.com/docs)