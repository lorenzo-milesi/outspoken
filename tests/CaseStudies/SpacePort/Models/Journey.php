<?php

namespace IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Models;

use DateTime;

class Journey
{
    public function __construct(
        public readonly string $departureSpacePortId,
        public readonly string $departureSchedule,
        public readonly string $arrivalSpacePortId
    ) { }
}
