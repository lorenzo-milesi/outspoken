<?php

namespace IloveCode\Outspoken;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class ApiAction
{
    public function __construct(
        public readonly string $route,
        public readonly string $httpMethod = 'GET'
    ) { }
}
