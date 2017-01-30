<?php

namespace GroundSix\Communicator\Test\Services;

use GroundSix\Communicator\Resources\Credentials;
use GroundSix\Communicator\Services\Service;
use GroundSix\Communicator\Test\TestCase;
use SoapClient;

class ServiceTest extends TestCase
{

    /**
     * @test
     */
    public function it_adds_a_soap_header_from_the_credentials()
    {
        $credentials = $this->createMock(Credentials::class);
        $client = $this->createMock(SoapClient::class);

        $client->expects($this->once())
            ->method('__setSoapHeaders')
            ->with($credentials->getHeader());
        $credentials->expects($this->once())
            ->method('getHeader');

        $this->getMockForAbstractClass(Service::class, [$credentials, $client]);
    }
}
