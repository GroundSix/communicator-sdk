<?php

namespace GroundSix\Communicator\Exceptions;

use Throwable;
use UnexpectedValueException;

class BadResponseException extends UnexpectedValueException
{
    /** @var \stdClass */
    protected $response;

    /**
     * @return \stdClass
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param \stdClass $response
     */
    public function setResponse($response): void
    {
        $this->response = $response;
    }
}
