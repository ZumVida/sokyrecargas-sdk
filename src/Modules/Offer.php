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
        return $this->http()->get('/api/v1/offers', [
            'query' => [
                'for_customer' => true,
            ],
        ]);
    }

    /**
     * Hace una recarga asociada a una oferta y tomando el ID del precio que se desea recargar.
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-POSTapi-v1-recharges-offers--offer_id--recharge
     *
     * @throws GuzzleException
     */
    public function recharge(int $offerId, array $params): ResponseInterface
    {
        return $this->http()->get('/api/v1/offers/'.$offerId.'/recharge', $params);
    }
}
