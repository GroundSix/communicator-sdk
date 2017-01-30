<?php

namespace GroundSix\Communicator\Resources;

use GroundSix\Communicator\Test\TestCase;
use TypeError;

/**
 * Tests for properties are required for the serialisation of
 * DataRecord to SOAP.
 */
class DataRecordTest extends TestCase
{
    /**
     * @test
     */
    public function it_stores_subscriptions_in_the_Subscriptions_property()
    {
        $subscriptions = [$this->createMock(Subscription::class)];

        $dataRecord = new DataRecord([], $subscriptions);

        $this->assertEquals($subscriptions, $this->getProtectedProperty($dataRecord, 'Subscriptions'));
    }

    /**
     * @test
     */
    public function it_stores_column_mappings_in_the_ColumnMappings_property()
    {
        $columnMappings = [$this->createMock(ColumnMapping::class)];

        $dataRecord = new DataRecord($columnMappings, []);

        $this->assertEquals($columnMappings, $this->getProtectedProperty($dataRecord, 'ColumnMappings'));
    }

    /**
     * @test
     */
    public function it_only_stores_Subscription_objects_in_the_Subscriptions_property()
    {
        $subscriptions = [$this->createMock(Subscription::class), null];

        $this->expectException(TypeError::class);
        new DataRecord([], $subscriptions);
    }

    /**
     * @test
     */
    public function it_only_stores_ColumnMapping_objects_in_the_ColumnMappings_property()
    {
        $columnMappings = [$this->createMock(ColumnMapping::class), null];

        $this->expectException(TypeError::class);
        new DataRecord($columnMappings, []);
    }
}
