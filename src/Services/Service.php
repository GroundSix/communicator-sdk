<?php

namespace GroundSix\Communicator\Services;

use GroundSix\Communicator\Exceptions\BadResponseException;
use GroundSix\Communicator\Resources\Credentials;
use SoapClient;

abstract class Service
{
    const NAMESPACE = 'http://ws.communicatorcorp.com/';

    /**
     * @var SoapClient
     */
    protected $client;

    /**
     * @var Credentials
     */
    protected $credentials;

    /**
     * Service constructor.
     *
     * @param Credentials $credentials
     * @param SoapClient  $client
     */
    public function __construct(Credentials $credentials, SoapClient $client = null)
    {
        $this->credentials = $credentials;

        if ($client === null) {
            $client = static::makeClient();
        }
        $this->client = $client;

        $this->client->__setSoapHeaders($credentials->getHeader());
    }

    abstract public static function makeClient(): SoapClient;
}
