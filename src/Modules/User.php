<?php

namespace Sokyrecargas\Modules;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;

final class User extends BaseModule
{
    /**
     * Obtener usuario actual.
     *
     * @link https://api.sokyrecargas.com/docs/#users-GETapi-v1-users-auth-current
     *
     * @throws GuzzleException
     */
    public function current(): ResponseInterface
    {
        return $this->http()->get('/v1/users/auth/current');
    }
}
