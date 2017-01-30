<?php

namespace GroundSix\Communicator\Test\Services;

use GroundSix\Communicator\Resources\Credentials;
use GroundSix\Communicator\Services\DataService;
use PHPUnit\Framework\TestCase;
use SoapClient;

class DataServiceTest extends TestCase
{

    /**
     * @test
     */
    public function it_makes_a_default_SoapClient()
    {
        $client = DataService::makeClient();

        $this->isInstanceOf(SoapClient::class, $client);
    }

    /**
     * @test
     */
    public function if_constructed_without_a_client_it_uses_the_default()
    {
        $dataService = new DataService($this->createMock(Credentials::class));

        $this->assertInstanceOf(DataService::class, $dataService);
    }
}
