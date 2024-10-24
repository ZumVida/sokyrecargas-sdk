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

/**
 * Make Recharge 
 */
$offerId = 2;
$offerPriceId = "abde-83dae-47fea-25fad-ae28";
$recipientPhoneNumber = "5351515151";

$recharge = \Sokyrecargas\Client::getContent(
    $sdk->offer()->recharge(
        $offerId,
        $recipientPhoneNumber,
        $offerPriceId
    )
);
```

Offers Response should be like

```json
[
    {
        "id": 2,
        "available": true,
        "image": "https://sokystorage.s3.tebi.io/images/offer_phpujXf5J_1728478075.jpg",
        "image_promo": "https://sokystorage.s3.tebi.io/images/offer_phpmqLDYE_1728416537.jpg",
        "name": "Nauta Plus",
        "description": "Internet ilimitado para nauta hogar y áreas wifi",
        "prices": [
            {
                "id": "3219a296-6092-4d93-ab2f-ed51cb486137",
                "label": "15 días",
                "value": "7.5"
            },
            {
                "id": "cc2cdfd7-fff0-41c1-b55c-b9897c5f4cf8",
                "label": "30 días",
                "value": "12.5"
            }
        ],
        "category": {
            "id": 1,
            "name": "Recargas"
        },
        "operator": {
            "id": 3,
            "code": "7319",
            "name": "Nauta Plus US",
            "available": true,
            "image": null
        },
        "start_date": null,
        "end_date": null
    }
]
```

Recharge response should be like

```json
{
    "data": {
        "id": 1166,
        "recipient_name": "Claudia Escribano Tercero",
        "recipient": "+5351515151",
        "amount": "41.83",
        "status": "pending",
        "operator": {
            "id": 2,
            "code": "8142",
            "name": "Promo Cubacel II",
            "available": true,
            "image": null
        },
        "user": {
            "id": 76,
            "name": "UserName",
            "email": "user-email@domain.com",
            "email_verified_at": null,
            "phone": "+5351515151",
            "phone_verified_at": null,
            "role": "guest",
            "coins": "1500.00"
        },
        "created_at": "2024-10-24T13:44:29.000000Z",
        "updated_at": "2024-10-24T13:44:29.000000Z"
    }
}
```

## Links

[API Documentation](https://api.sokyrecargas.com/docs)