<?php

namespace IloveCode\Outspoken\Tests\app\Http\Controllers;

use IloveCode\Outspoken\ApiAction;
use IloveCode\Outspoken\ApiController;
use IloveCode\Outspoken\ApiLink;

#[ApiController('profile')]
class GenericApiController extends Controller
{
    #[
        ApiAction('profile'),
        ApiLink('profile'),
        ApiLink('subscribe')
    ]
    public function profile()
    {

    }

    public function store()
    {

    }

    #[ApiAction('profile/subscribe')]
    public function subscribe()
    {

    }
}
