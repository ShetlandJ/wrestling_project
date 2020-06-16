<?php

namespace App\Http\Resources;

use App\Http\Resources\BaseResource;
use App\Http\Services\PromotionService;
use Illuminate\Database\Eloquent\Model;

class PromotionResource extends BaseResource
{
    public function buildResource(Model $promotion, bool $includeRelationships = false)
    {
        $resource = [
            'id' => $promotion->uuid,
            'name' => $promotion->name,
            'description' => $promotion->description,
            'alias' => $promotion->alias,
            'founded' => $promotion->founded,
            'active' => $promotion->active,
        ];

        $resource['wrestlers'] = app(PromotionService::class)->getWrestlers($promotion->id);

        dd(app(PromotionService::class)->getWrestlers($promotion->id));

        return $resource;
    }
}