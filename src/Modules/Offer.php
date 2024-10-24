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
     * @param int $offerId ID de la oferta
     * @param string $phoneNumber Numero de teléfono del destinatario
     * @param string $priceId ID del precio seleccionado de la oferta
     * @param string|null $recipientName (opcional) Nombre del destinatario
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function recharge(int $offerId, string $phoneNumber, string $priceId, ?string $recipientName = null): ResponseInterface
    {
        return $this->http()->get('/api/v1/offers/'.$offerId.'/recharge', [
            'price_id' => $priceId,
            'recipient'=>  $phoneNumber,
            'recipient_name'=>  $recipientName,
        ]);
    }
}
