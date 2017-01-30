<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 16/01/2017
 * Time: 19:37
 */

namespace Resources;

use GroundSix\Communicator\Resources\ColumnMapping;
use GroundSix\Communicator\Test\TestCase;
use stdClass;
use TypeError;

/**
 * Tests for properties are required for the serialisation of
 * ColumnMapping to SOAP.
 */
class ColumnMappingTest extends TestCase
{

    /**
     * @test
     */
    public function it_stores_the_column_id_in_the_ColumnId_property()
    {
        $columnMapping = new ColumnMapping(1, false);

        $this->assertEquals(1, $this->getProtectedProperty($columnMapping, 'ColumnId'));
    }

    /**
     * @test
     */
    public function it_stores_the_value_in_the_Value_property()
    {
        $columnMapping = new ColumnMapping(1, 'value');

        $this->assertEquals('value', $this->getProtectedProperty($columnMapping, 'Value'));
    }

    /**
     * @test
     */
    public function it_can_create_many_ColumnMappings_from_an_array()
    {
        $mappings = ColumnMapping::map([12345 => true, 67890 => 'string']);

        $this->assertEquals(
            [new ColumnMapping(12345, true), new ColumnMapping(67890, 'string')],
            $mappings
        );
    }

    /**
     * @test
     */
    public function it_stores_boolean_values_as_a_string()
    {
        $trueMapping = new ColumnMapping(12345, true);
        $falseMapping = new ColumnMapping(12345, false);

        $this->assertEquals('true', $this->getProtectedProperty($trueMapping, 'Value'));
        $this->assertEquals('false', $this->getProtectedProperty($falseMapping, 'Value'));
    }

    /**
     * @test
     */
    public function it_stores_the_value_as_a_string()
    {
        $mapping = new ColumnMapping(12345, 1);

        $this->assertEquals('1', $this->getProtectedProperty($mapping, 'Value'));
        $this->assertTrue(is_string($this->getProtectedProperty($mapping, 'Value')));
    }

    /**
     * @test
     */
    public function it_throws_a_TypeError_if_the_value_cannot_be_cast_to_a_string()
    {
        $this->expectException(TypeError::class);
        new ColumnMapping(12345, new stdClass());
    }
}
