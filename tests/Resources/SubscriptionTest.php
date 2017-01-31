<?php

namespace GroundSix\Communicator\Test\Resources;

use GroundSix\Communicator\Resources\Subscription;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * Tests for properties are required for the serialisation of
 * Subscription to SOAP.
 */
class SubscriptionTest extends TestCase
{

    /**
     * @test
     */
    public function it_stores_the_mailing_list_id_in_MailingListId_property()
    {
        $subscription = new Subscription(12345);

        $this->assertEquals(12345, $subscription->MailingListId);
    }

    /**
     * @test
     */
    public function that_subscription_status_is_stored_in_IsSubscribed_property()
    {
        $subscription = new Subscription(12345, false);

        $this->assertFalse($subscription->Subscribed);
    }

    /**
     * @test
     */
    public function the_option_to_honour_unsubscriptions_is_stored_in_HonourExistingUnsubscribes_property()
    {
        $subscription = new Subscription(12345, false, true);

        $this->assertTrue($subscription->HonourExistingUnsubscribes);
    }

    /**
     * @test
     * @dataProvider buildSubscriptionsProvider
     *
     * @param $array
     * @param $length
     * @param $expected
     */
    public function it_creates_an_array_of_subscriptions_from_an_array($array, $length, $expected)
    {
        $result = Subscription::fromArray($array);

        $this->assertTrue(is_array($result));
        $this->assertCount($length, $result);
        $this->assertEquals($expected, $result);
    }

    /**
     * @test
     * @dataProvider exceptionMessageProvider
     *
     * @param $array
     * @param $message
     */
    public function it_throws_an_exception_if_the_data_given_to_fromArray_is_incorrect($array, $message)
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage($message);

        Subscription::fromArray($array);
    }

    public function buildSubscriptionsProvider()
    {
        return [
            "From mailing list id" => [[1], 1, [new Subscription(1)]],
            "Mailing list id key" => [[1 => false], 1, [new Subscription(1, false)]],
            [[1, 2], 2, [new Subscription(1), new Subscription(2)]],
            [[1 => false, 2], 2, [new Subscription(1, false), new Subscription(2)]],
        ];
    }

    public function exceptionMessageProvider()
    {
        return [
            [[''], 'Array values must be integers or booleans with integer keys, integer => string given.'],
            [[null], 'Array values must be integers or booleans with integer keys, integer => NULL given.'],
        ];
    }
}
