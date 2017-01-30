<?php

namespace GroundSix\Communicator\Test;

use ReflectionClass;
use stdClass;

abstract class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @param mixed  $object
     * @param string $propertyName
     *
     * @return mixed
     */
    protected function getProtectedProperty($object, string $propertyName)
    {
        $reflectedClass = new ReflectionClass($object);
        $reflectedProperty = $reflectedClass->getProperty($propertyName);
        $reflectedProperty->setAccessible(true);

        return $reflectedProperty->getValue($object);
    }

    protected function arrayToObject(array $array): stdClass
    {
        return json_decode(json_encode($array));
    }
}
