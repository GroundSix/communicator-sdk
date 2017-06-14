<?php

namespace GroundSix\Communicator;

use GroundSix\Communicator\Resources\Resource;
use SoapHeader;
use SoapVar;

class Credentials extends Resource
{
    /** The name of the XML node in the SOAP request */
    const HEADER_NAME = 'CommunicatorCredentials';

    /** @var  string */
    private $Username;
    /** @var  string */
    private $Password;

    /**
     * @param string $username
     * @param string $password
     */
    public function __construct(string $username, string $password)
    {
        $this->Username = $username;
        $this->Password = $password;
    }

    /**
     * Build a SoapHeader for authenticating with Communicator.
     *
     * Communicator requires that the authentication header is built of SoapVar's
     * instead of an object matching the required fields.
     *
     * @return SoapHeader
     */
    public function getHeader(): SoapHeader
    {
        $data = new SoapVar(
            [
                new SoapVar($this->Username, XSD_STRING, null, null, 'Username', self::NAMESPACE),
                new SoapVar($this->Password, XSD_STRING, null, null, 'Password', self::NAMESPACE),
            ],
            SOAP_ENC_OBJECT
        );

        return new SoapHeader(self::NAMESPACE, self::HEADER_NAME, $data);
    }
}
