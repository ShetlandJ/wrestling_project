<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Database\Eloquent\Model;

class WrestlerResource extends BaseResource
{
    public function buildResource(Model $wrestler, bool $includeRelationships = false)
    {
        $resource = [
            'id' => $wrestler->uuid,
            'fullname' => $wrestler->fullname,
            'ring_name' => $wrestler->ring_name,
            'slug' => $wrestler->slug,
            'active' => $wrestler->active,
            'date_of_birth' => $wrestler->date_of_birth,
            'date_of_death' => $wrestler->date_of_death,
        ];

        return $resource;
    }
}