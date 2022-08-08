<?php

namespace IloveCode\Outspoken\Tests\app\Models;

use Illuminate\Database\Eloquent\Model;
use IloveCode\Outspoken\ApiModel;

#[ApiModel([
    'fields' => ['id', 'title']
])]
class PartialFieldsApiModel extends Model
{
    use HasGenericFields;
}
