<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;
use Illuminate\Database\Eloquent\Model;

class PromotionResource extends BaseResource
{
    public function buildResource(Model $promotion, bool $includeRelationships = false)
    {
        return [
            'id' => $promotion->uuid,
            'name' => $promotion->name,
            'description' => $promotion->description,
            'alias' => $promotion->alias,
            'founded' => $promotion->founded,
            'active' => $promotion->active,
        ];
    }
}