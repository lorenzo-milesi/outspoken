<?php

use Carbon\Carbon;

it('can create a search resource', function () {
    $this->withoutExceptionHandling();
    $body = [
        'journeys' => [
            [
                'departureSpacePortId' => "1",
                'departureSchedule' => Carbon::now()->nextWeekday()->format(DATE_ATOM),
                'arrivalSpacePortId' => "2",
            ],
        ],
    ];

    $response = $this->post('/api/searches', $body);

    expect($response->getContent())
        ->toBe(json_encode([
            'criteria' => $body,
            '_links' => [
                'self' => [
                    'href' => '/api/searches/1',
                ]
            ],
        ]));
});
