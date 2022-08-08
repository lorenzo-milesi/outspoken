<?php

namespace IloveCode\Outspoken\Documents;

use Illuminate\Database\Eloquent\Collection;
use IloveCode\Outspoken\ApiModel;
use ReflectionClass;

class HALDocument
{
    public static function item(mixed $model): HALItem
    {
        $reflection = new ReflectionClass($model);
        $attributes = $reflection->getAttributes(ApiModel::class);

        if (isset($attributes[0])) {
            $attribute = $attributes[0];
            $body = $attribute->getArguments()[0];

            return new HALItem($model, $body);
        }

        return new HALItem($model);
    }

    public static function collection(string $class, Collection $items)
    {
        $reflection = new ReflectionClass($class);
        $attributes = $reflection->getAttributes(ApiModel::class);

        if (isset($attributes[0])) {
            $attribute = $attributes[0];
            $body = $attribute->getArguments()[0];

            return new HALCollection($class, $items, $body);
        }

        return new HALCollection($class, $items);
    }
}
