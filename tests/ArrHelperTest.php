<?php

use IloveCode\Outspoken\Helpers\Arr;

it('turns complete list into associative array', function () {
    $array = ['id', 'title', 'description'];
    expect(Arr::toAssociativeArray($array))->toBe([
        'id' => 'id',
        'title' => 'title',
        'description' => 'description',
    ]);
});

it('keeps complete associative array as-is', function () {
    $array = ['ID' => 'id', 'Title' => 'title', 'Description' => 'description'];
    expect(Arr::toAssociativeArray($array))->toBe($array);
});

it('understands how to format hybrid array', function () {
    $array = ['ID' => 'id', 'title', 'Description' => 'description'];
    expect(Arr::toAssociativeArray($array))->toBe([
        'ID' => 'id', 'title' => 'title', 'Description' => 'description',
    ]);
});
