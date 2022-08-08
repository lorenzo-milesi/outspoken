<?php

namespace IloveCode\Outspoken\Tests\app\Models;

use Illuminate\Database\Eloquent\Model;
use IloveCode\Outspoken\ApiModel;

#[ApiModel([
    'fields' => ['id', 'Name' => 'title']
])]
class RenamedFieldsApiModel extends Model
{
    use HasGenericFields;
}
