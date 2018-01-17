<?php

namespace pxgamer\Cryptopia;

use GuzzleHttp\Client;

/**
 * Class Basic.
 */
class Basic
{
    /**
     * The base URI of the extended API.
     */
    const BASE_URI = 'https://www.cryptopia.co.nz/api/';
    /**
     * @var Client
     */
    protected $client;

    /**
     * Basic constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::BASE_URI,
        ]);
    }

    public function getCurrencies()
    {
        $response = \GuzzleHttp\json_decode(
            $this->client
                ->get('getcurrencies')
                ->getBody()
                ->getContents()
        );

        if ($response->Success) {
            return $response->Data;
        }

        return null;
    }

    public function getTradePairs()
    {
        $response = \GuzzleHttp\json_decode(
            $this->client
                ->get('gettradepairs')
                ->getBody()
                ->getContents()
        );

        if ($response->Success) {
            return $response->Data;
        }

        return null;
    }

    public function getMarkets(string $baseMarket = '', int $hours = 24)
    {
        $response = \GuzzleHttp\json_decode(
            $this->client
                ->get('getmarkets/'.$baseMarket.'/'.$hours)
                ->getBody()
                ->getContents()
        );

        if ($response->Success) {
            return $response->Data;
        }

        return null;
    }
}