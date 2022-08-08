<?php

namespace IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Models;


use IloveCode\Outspoken\ApiModel;
use IloveCode\Outspoken\Tests\CaseStudies\SpacePort\Controllers\SearchController;

#[ApiModel([
    'fields' => ['criteria'],
    'actions' => SearchController::class
])]
class Search
{
    public function __construct(
        public readonly string $id,
        public readonly array $criteria
    ) { }
}
