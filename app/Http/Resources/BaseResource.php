<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Model;

abstract class BaseResource
{
    abstract public function buildResource(Model $form);

    public static function create(Model $form, bool $includeRelationships = true)
    {
        $instance = new static();

        return $instance->buildResource($form, $includeRelationships);
    }
}