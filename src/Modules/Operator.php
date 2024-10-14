<?php

namespace Sokyrecargas\Modules;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class Operator extends BaseModule
{
    /**
     * Obtener los operadores disponibles
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-GETapi-v1-recharges-operators
     *
     * @throws GuzzleException
     */
    public function list(array $params): ResponseInterface
    {
        return $this->http()->get('/api/v1/recharges/operators');
    }


    /**
     * Obtener detalles de un operador
     *
     * @link https://api.sokyrecargas.com/docs/#recargas-GETapi-v1-recharges-operators--id-
     *
     * @throws GuzzleException
     */
    public function details(int $operatorId): ResponseInterface
    {
        return $this->http()->get('/api/v1/recharges/operators/'.$operatorId);
    }
}
