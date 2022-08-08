<?php

namespace IloveCode\Outspoken\Helpers;

class Arr
{
    public static function toAssociativeArray(array $arr): array
    {
        $result = [];
        foreach ($arr as $key => $it) {
            $result[(is_string($key) ? $key : $it)] = $it;
        }

        return $result;
    }
}
