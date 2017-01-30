<?php

namespace GroundSix\Communicator\Services;

use GroundSix\Communicator\DataService\AddContact;
use GroundSix\Communicator\Exceptions\BadResponseFormat;
use GroundSix\Communicator\Exceptions\DataImporterException;
use SoapClient;

class DataService extends Service
{
    const WSDL = 'https://ws.communicatorcorp.com/DataService.asmx?WSDL';

    public static function makeClient(array $soapSettings = []): SoapClient
    {
        $defaults = [
            'exception' => true,
            'soap_version' => SOAP_1_2,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
        ];

        return new SoapClient(self::WSDL, array_merge($defaults, $soapSettings));
    }

    /**
     * Add a contact to a Communicator contact table
     *
     * @param AddContact $addContact
     *
     * @throws BadResponseFormat if the response doesn't match what is expected
     * @throws DataImporterException if the contact is not successfully added
     *
     * @return bool
     */
    public function addContact(AddContact $addContact)
    {
        $response = $this->client->DataImporter($addContact->getRequest());

        return $addContact->formatResponse($response);
    }
}
