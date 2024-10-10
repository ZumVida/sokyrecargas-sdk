<?php

namespace Sokyrecargas;

use Psr\Http\Message\ResponseInterface;
use Sokyrecargas\Modules\Offer;
use Sokyrecargas\Modules\Refill;
use Sokyrecargas\Modules\User;

class Client
{

    public function __construct(
        $apiBaseUrl,
        $authToken
    )
    {
        $this->client = HttpClient::getClient(
            $apiBaseUrl
        );
        if($authToken)
            HttpClient::setAuthToken($authToken);
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
