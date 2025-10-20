<?php

namespace Support\CastAttributes;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class SerializationString implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes)
    {
        return serializationString($value, false);
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return serializationString($value, false);
    }
}
