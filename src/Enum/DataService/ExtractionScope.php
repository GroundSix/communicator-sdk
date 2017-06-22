<?php

namespace GroundSix\Communicator\Enum\DataService;

use MyCLabs\Enum\Enum;

/**
 * @method static ExtractionScope STANDARD()
 * @method static ExtractionScope EXTENDED()
 */
class ExtractionScope extends Enum
{
    const STANDARD = 'Standard';
    const EXTENDED = 'Extended';
}

