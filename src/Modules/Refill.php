<?php

namespace Sokyrecargas\Modules;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class Refill extends BaseModule
{
    /**
     * Crea una nueva recarga.
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-POSTapi-v1-recharges
     *
     * @throws GuzzleException
     */
    public function create(array $params): ResponseInterface
    {
        return $this->http()->post('/api/v1/recharges', $params);
    }

    /**
     * Listar mis recargas.
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-GETapi-v1-recharges-mine
     *
     * @throws GuzzleException
     */
    public function listMine(): ResponseInterface
    {
        return $this->http()->get('/api/v1/recharges/mine');
    }

    /**
     * Mostrar detalles de una recarga.
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-GETapi-v1-recharges--id-
     *
     * @throws GuzzleException
     */
    public function details(int $id): ResponseInterface
    {
        return $this->http()->get("/api/v1/recharges/{$id}");
    }
}
