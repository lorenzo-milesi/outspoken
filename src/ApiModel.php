<?php

namespace IloveCode\Outspoken;

use Attribute;

#[Attribute(Attribute::TARGET_CLASS)]
class ApiModel
{
    public function __construct(public readonly array $resource)
    {
    }
}
