<?php

namespace GroundSix\Communicator\Test\Services\DataService;

use GroundSix\Communicator\DataService\AddContact;
use GroundSix\Communicator\Resources\Credentials;
use GroundSix\Communicator\Services\DataService;
use PHPUnit\Framework\TestCase;
use SoapClient;
use stdClass;

class AddContactTest extends TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject */
    protected $client;
    /** @var  DataService */
    protected $service;
    /** @var  AddContact */
    protected $addContact;

    public function setUp()
    {
        $credentials = $this->createMock(Credentials::class);
        $this->client = $this->getMockBuilder(SoapClient::class)
            ->disableOriginalConstructor()
            ->setMethods(['DataImporter'])
            ->getMock();
        $this->client->method('DataImporter')
            ->willReturn(new stdClass());
        $this->service = new DataService($credentials, $this->client);
        $this->addContact = $this->createMock(AddContact::class);
    }

    /**
     * @test
     */
    public function it_calls_getRequest_on_AddContact_once()
    {
        $this->addContact->expects($this->once())
            ->method('getRequest');

        $this->service->addContact($this->addContact);
    }

    /**
     * @test
     */
    public function it_calls_formatResponse_on_AddContact_once_with_the_response()
    {
        $this->addContact->expects($this->once())
            ->method('formatResponse')
            ->with(new stdClass());

        $this->service->addContact($this->addContact);
    }
}
