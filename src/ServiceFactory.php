<?php

namespace GroundSix\Communicator;

use GroundSix\Communicator\Services\DataService;
use GroundSix\Communicator\Services\MessageService;
use GroundSix\Communicator\Services\ResponseService;
use GroundSix\Communicator\Services\Validator;
use SoapClient;

class ServiceFactory
{
    private const WSDL_NAMES = [
        'DataService' => 'DataService.wsdl',
        'MessageService' => 'MessageService.wsdl',
        'ResponseService' => 'ResponseService.wsdl',
    ];
    private const XSD_NAMES = [
        'DataService' => 'DataService.xsd',
        'MessageService' => 'MessageService.xsd',
        'ResponseService' => 'ResponseService.xsd',
    ];

    public static function DataService(Credentials $credentials): DataService
    {
        $serviceName = 'DataService';
        $wsdl = self::getWsdlPath($serviceName);
        $xsd = self::getXsdPath($serviceName);
        $client = self::makeClient($wsdl, $credentials);
        $validator = new Validator($xsd);

        return new DataService($client, $validator);
    }

    public static function MessageService(Credentials $credentials): MessageService
    {
        $serviceName = 'MessageService';
        $wsdl = self::getWsdlPath($serviceName);
        $xsd = self::getXsdPath($serviceName);
        $client = self::makeClient($wsdl, $credentials);
        $validator = new Validator($xsd);

        return new MessageService($client, $validator);
    }

    public static function ResponseService(Credentials $credentials): ResponseService
    {
        $serviceName = 'ResponseService';
        $wsdl = self::getWsdlPath($serviceName);
        $xsd = self::getXsdPath($serviceName);
        $client = self::makeClient($wsdl, $credentials);
        $validator = new Validator($xsd);

        return new ResponseService($client, $validator);
    }

    private static function makeClient(string $wsdl, Credentials $credentials): SoapClient
    {
        $client = new SoapClient($wsdl, [
            'exception' => true,
            'trace' => true,
            'soap_version' => SOAP_1_2,
            'features' => SOAP_SINGLE_ELEMENT_ARRAYS,
        ]);

        $client->__setSoapHeaders($credentials->getHeader());

        return $client;
    }

    private static function getWsdlPath(string $serviceName): string
    {
        assert(array_key_exists($serviceName, self::WSDL_NAMES));

        return __DIR__ . '/../resources/wsdl/' . self::WSDL_NAMES[$serviceName];
    }

    private static function getXsdPath(string $serviceName): string
    {
        assert(array_key_exists($serviceName, self::XSD_NAMES));

        return __DIR__ . '/../resources/xsd/' . self::XSD_NAMES[$serviceName];
    }
}
