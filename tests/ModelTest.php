<?php

use IloveCode\Outspoken\Documents\HALDocument;
use IloveCode\Outspoken\Tests\app\Models\GenericApiModel;
use IloveCode\Outspoken\Tests\app\Models\NamedGenericApiModel;
use IloveCode\Outspoken\Tests\app\Models\PartialFieldsApiModel;
use IloveCode\Outspoken\Tests\app\Models\RenamedFieldsApiModel;

// Generic name

it('has a defaut name', function () {
    $post = new GenericApiModel();
    $document = HALDocument::item($post);
    expect($document->name())->toBe('generic-api-model');
});

it('can have a given name', function () {
    $post = new NamedGenericApiModel();
    $document = HALDocument::item($post);
    expect($document->name())->toBe('post');
});

// Generic fields (for global documents)

it('shows fields', function () {
    $post = new NamedGenericApiModel();
    $document = HALDocument::item($post);
    expect($document->fields())->toBe([
        'id' => 1,
        'title' => 'This is a super title',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut velit libero, vulputate ac rutrum eget, sodales sit amet nulla. Nam imperdiet dapibus convallis. Fusce nec turpis vitae enim sollicitudin dapibus. Proin et sollicitudin magna. Etiam bibendum hendrerit luctus. Praesent sodales sem gravida enim efficitur, ut lobortis justo venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum bibendum arcu a cursus porttitor. Nulla sit amet placerat ligula. Aliquam sit amet ante at purus eleifend viverra. Nulla placerat a odio sed finibus. Nullam nec nunc in orci mattis suscipit id eget orci. Aenean sapien massa, maximus sed sollicitudin eget, molestie non sapien.'
    ]);
});

it('shows only precised fields', function () {
    $post = new PartialFieldsApiModel();
    $document = HALDocument::item($post);
    expect($document->fields())->toBe([
        'id' => 1,
        'title' => 'This is a super title',
    ]);
});

it('can rename fields', function () {
    $post = new RenamedFieldsApiModel();
    $document = HALDocument::item($post);
    expect($document->fields())->toBe([
        'id' => 1,
        'Name' => 'This is a super title',
    ]);
});

// Generic actions

it('understands actions', function () {
    $post = new NamedGenericApiModel();
    $document = HALDocument::item($post);
    expect($document->actions('profile'))->toBe([
        '_links' => [
            'profile' => [
                'href' => '/api/profile',
            ],
            'subscribe' => [
                'href' => '/api/profile/subscribe'
            ]
        ]
    ]);
});
