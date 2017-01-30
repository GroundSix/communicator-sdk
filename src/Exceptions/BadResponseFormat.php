<?php

namespace GroundSix\Communicator\Exceptions;

use InvalidArgumentException;

/**
 * BadResponseFormat is used when the response received from Communicator
 * is not in the expected format.
 */
class BadResponseFormat extends InvalidArgumentException
{
}
