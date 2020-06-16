<?php

namespace App\Http\Services;

use App\Models\Wrestler;
use App\Models\WrestlingPromotion;
use App\Http\Resources\WrestlerResource;

class PromotionService
{
    public function getAll()
    {
        return WrestlingPromotion::all();
    }

    public function findById(int $id)
    {
        return WrestlingPromotion::where('id', $id)->first();
    }

    public function findByAlias(string $alias)
    {
        return WrestlingPromotion::where('alias', $alias)->first();
    }

    public function getWrestlersForPromotion(int $promotionId)
    {
        $query = Wrestler::where('wrestling_promotions.id', $promotionId)
        ->join('wrestlers_to_promotions', 'wrestlers_to_promotions.wrestler_id', 'wrestlers.id')
        ->join('wrestling_promotions', 'wrestling_promotions.id', 'wrestlers_to_promotions.promotion_id');

        $addSlashes = str_replace('?', "'?'", $query->toSql());
$asdf = vsprintf(str_replace('?', '%s', $addSlashes), $query->getBindings());
dd($asdf);

        return Wrestler::where('wrestling_promotions.id', $promotionId)
            ->join('wrestlers_to_promotions', 'wrestlers_to_promotions.wrestler_id', 'wrestlers.id')
            ->join('wrestling_promotions', 'wrestling_promotions.id', 'wrestlers_to_promotions.promotion_id')
            ->get();
    }

    public function getWrestlers(int $promotionId): array
    {
        $promotionWrestlers = $this->getWrestlersForPromotion($promotionId);

        $wrestlers = [];

        foreach ($promotionWrestlers as $wrestler) {
            $wrestlers[] = WrestlerResource::create($wrestler);
        }

        return $wrestlers;
    }
}
