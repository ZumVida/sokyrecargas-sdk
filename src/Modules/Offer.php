<?php

namespace Sokyrecargas\Modules;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class Offer extends BaseModule
{
    /**
     * Obtener las ofertas disponibles paginadas.
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-GETapi-v1-recharges-offers
     *
     * @throws GuzzleException
     */
    public function list(array $params): ResponseInterface
    {
        return $this->http()->get('/v1/offers', [
            'query' => [
                'for_customer' => true,
            ],
        ]);
    }
}
