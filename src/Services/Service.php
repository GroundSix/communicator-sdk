<?php

namespace GroundSix\Communicator\Services;

use GroundSix\Communicator\Exceptions\BadResponseException;
use SoapClient;

abstract class Service
{
    const NAMESPACE = 'http://ws.communicatorcorp.com/';
    /** @var SoapClient */
    private $client;
    /** @var Validator */
    protected $validator;

    /**
     * Service constructor.
     *
     * @param SoapClient $client
     * @param Validator  $validator
     */
    public function __construct(SoapClient $client, Validator $validator)
    {
        $this->client = $client;
        $this->validator = $validator;
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

    protected function sendRequest($name, $request = null)
    {
        $response = $this->client->$name($request);
        $this->validate();

        return $response;
    }
}
