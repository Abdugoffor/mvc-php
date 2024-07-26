<?php

namespace MVC\Support;

use ArrayAccess;

class Arr
{
    public static function only($array, $keys)
    {
        return array_intersect_key($array, array_flip((array) $keys));
    }

    public static function accessible($value)
    {
        return is_array($value) || $value instanceof ArrayAccess;
    }

    public static function exists($array, $key)
    {
        if ($array instanceof ArrayAccess) {

            return $array->offsetExists($key);
        }

        return array_key_exists($key, $array);
    }

    public static function has($array, $keys)
    {
        if (!is_array($array)) {

            return false;
        }

        $keys = (array) $keys;

        if ($keys == []) {

            return false;
        }

        foreach ($keys as $key) {

            if (static::exists($array, $key)) {

                continue;
            }

            foreach (explode('.', $key) as $segment) {

                if (static::accessible($array) && static::exists($array, $segment)) {

                    $array = $array[$segment];
                } else {

                    return false;
                }
            }
        }

        return true;
    }
}
