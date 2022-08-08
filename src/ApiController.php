<?php

namespace IloveCode\Outspoken;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class ApiController
{
    public function __construct(public readonly string $name)
    {
    }
}
