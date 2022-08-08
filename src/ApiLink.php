<?php

namespace IloveCode\Outspoken;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD, Attribute::IS_REPEATABLE)]
class ApiLink
{
    public function __construct(
        public readonly string $method
    ) { }
}
