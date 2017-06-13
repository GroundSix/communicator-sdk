<?php

namespace GroundSix\Communicator\Services;

use GroundSix\Communicator\DataService\AddContact;
use GroundSix\Communicator\Exceptions\BadResponseException;
use GroundSix\Communicator\Exceptions\DataImporterException;
use SoapClient;

class DataService extends Service
{
    const WSDL = 'https://ws.communicatorcorp.com/DataService.asmx?WSDL';

    public static function makeClient(array $soapSettings = []): SoapClient
    {
        $defaults = [
            'exception' => true,
            'trace' => true,
            'soap_version' => SOAP_1_2,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
        ];

        return new SoapClient(self::wsdlPath(), array_merge($defaults, $soapSettings));
    }

    /**
     * Add a contact to a Communicator contact table
     *
     * @param AddContact $addContact
     *
     * @throws BadResponseException if the response doesn't match what is expected
     * @throws DataImporterException if the contact is not successfully added
     *
     * @return bool
     */
    public function addContact(AddContact $addContact)
    {
        $response = $this->call('DataImporter', $addContact->getRequest());

        return $addContact->formatResponse($response);
    }

    protected static function xsdPath(): string
    {
        return __DIR__ . '/../../resources/xsd/DataService.xsd';
    }

    private static function wsdlPath(): string
    {
        return __DIR__ . '/../../resources/wsdl/DataService.wsdl';
    }

    private function call($name, $arguments)
    {
        $response = $this->client->$name(...$arguments);
        $this->validate();

        return $response;
    }
}
