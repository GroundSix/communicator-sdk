<?php

namespace GroundSix\Communicator\Services;

use GroundSix\Communicator\Exceptions\BadResponseException;
use GroundSix\Communicator\Resources\Credentials;
use SoapClient;

abstract class Service
{
    const NAMESPACE = 'http://ws.communicatorcorp.com/';

    /** @var SoapClient */
    protected $client;
    /** @var Credentials */
    protected $credentials;
    /** @var Validator */
    protected $validator;

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

        $this->validator = new Validator(static::xsdPath());
    }

    /**
     * @throws BadResponseException if the response is not valid
     */
    protected function validate(): ?bool
    {
        $response = $this->client->__getLastResponse();
        if ($response === null) {
            return null;
        }

        return $this->validator->validate($response);
    }

    abstract public static function makeClient(): SoapClient;

    abstract protected static function xsdPath(): string;
}
