<?php

namespace Sokyrecargas;

use Psr\Http\Message\ResponseInterface;
use Sokyrecargas\Modules\Offer;
use Sokyrecargas\Modules\Refill;
use Sokyrecargas\Modules\User;

readonly class Client
{
    private \GuzzleHttp\Client $client;

    public function __construct(
        string $apiKey,
        private string $apiBaseUrl = 'https://api.sokyrecargas.com/api',
    )
    {
        $this->client = HttpClient::getClient(
            baseUrl: $this->apiBaseUrl,
        );

        HttpClient::setAuthToken($apiKey);
    }

    public function offer(): Offer
    {
        return new Offer();
    }

    public function refill(): Refill
    {
        return new Refill();
    }

    public function user(): User
    {
        return new User();
    }

    static public function getContent(ResponseInterface $response): array
    {
        return json_decode($response->getBody()->getContents(), true);
    }
}
