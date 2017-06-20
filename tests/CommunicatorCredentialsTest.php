<?php

namespace GroundSix\Communicator\Test;

use GroundSix\Communicator\Credentials;
use PHPUnit\Framework\TestCase;
use SoapHeader;
use SoapVar;

/**
 * Communicator requires that the authentication header is built of SoapVar's
 * instead of another object matching the required fields which is why
 * this test goes into such detail.
 */
class CommunicatorCredentialsTest extends TestCase
{
    /** @var  Credentials */
    protected static $credentials;

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();
        static::$credentials = new Credentials('adam', '86b8f9a8bede');
    }

    /**
     * @test
     */
    public function it_creates_a_SoapHeader_to_use_when_authenticating_with_communicator()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();

        $this->assertInstanceOf(SoapHeader::class, $header);
    }

    /**
     * @test
     */
    public function it_creates_a_SoapHeader_with_communicators_namespace()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();

        $this->assertEquals('http://ws.communicatorcorp.com/', $header->namespace);
    }

    /**
     * @test
     */
    public function it_creates_a_SoapHeader_with_the_name_CommunicatorCredentials()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();

        $this->assertEquals('CommunicatorCredentials', $header->name);
    }

    /**
     * @test
     */
    public function it_creates_a_SoapHeader_with_a_single_SoapVar_as_data()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();

        $this->assertInstanceOf(SoapVar::class, $header->data);
    }

    /**
     * @test
     */
    public function it_puts_the_username_in_the_SoapHeader_as_a_SoapVar_called_Username()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();
        $username = $header->data->enc_value[0];

        $this->assertInstanceOf(SoapVar::class, $username);
        $this->assertEquals('Username', $username->enc_name);
        $this->assertEquals('adam', $username->enc_value);
    }

    /**
     * @test
     */
    public function it_puts_the_password_in_the_SoapHeader_as_a_SoapVar_called_password()
    {
        $credentials = self::$credentials;

        $header = $credentials->getHeader();
        $password = $header->data->enc_value[1];

        $this->assertInstanceOf(SoapVar::class, $password);
        $this->assertEquals('Password', $password->enc_name);
        $this->assertEquals('86b8f9a8bede', $password->enc_value);
    }
}
