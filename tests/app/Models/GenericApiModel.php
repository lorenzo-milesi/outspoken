<?php

namespace IloveCode\Outspoken\Tests\app\Models;

use Illuminate\Database\Eloquent\Model;
use IloveCode\Outspoken\ApiModel;
use IloveCode\Outspoken\Tests\app\Http\Controllers\GenericApiController;

#[ApiModel([
    'fields' => ['id', 'title', 'description'],
    'actions' => [GenericApiController::class]
])]
class GenericApiModel extends Model
{
    use HasGenericFields;
}
