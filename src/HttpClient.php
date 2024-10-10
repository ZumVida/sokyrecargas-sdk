<?php

declare(strict_types=1);

namespace Sokyrecargas;

use GuzzleHttp\Client;

class HttpClient
{
    // Hold the instance of the Guzzle client
    private static $client    = null;
    private static $baseUrl    = 'https://api.sokyrecargas.com/api';
    private static $authToken = null;

    // Private constructor to prevent instantiation
    private function __construct() {}

    /**
     * Get the singleton instance of the Guzzle client.
     */
    public static function getClient(
        string $baseUrl = 'https://api.sokyrecargas.com/api',
        ?string $authToken = null
    ): Client {

        self::setConfig(
            $baseUrl,
            $authToken
        );

        if (self::$client === null) {
            $config       = [
                'base_uri' => self::$baseUrl,
                'timeout'  => 5.0,
                'headers'  => [
                    'Accept' => 'application/json',
                ],
            ];

            if (self::$authToken) {
                $config['headers']['Authorization'] = 'Bearer ' . self::$authToken;
            }

            self::$client = new Client($config);
        }

        return self::$client;
    }

    private static function setConfig(
        ?string $baseUrl = null,
        ?string $authToken = null
    ): void {
        if ($authToken) {
            self::$authToken = $authToken;
        }
        if ($baseUrl) {
            self::$baseUrl = $baseUrl;
        }
    }

    public static function setAuthToken(?string $token): void
    {
        self::$authToken = $token;
    }
}
