<?php

namespace IloveCode\Outspoken\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IloveCode\Outspoken\Outspoken
 */
class Outspoken extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IloveCode\Outspoken\Outspoken::class;
    }
}
