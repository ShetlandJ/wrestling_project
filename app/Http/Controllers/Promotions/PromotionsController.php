<?php

namespace App\Http\Controllers\Promotions;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PromotionService;
use App\Http\Resources\PromotionResource;
use Symfony\Component\HttpFoundation\Response;

class PromotionsController extends Controller
{
    public function index()
    {
        $promotions = app(PromotionService::class)->getAll();

        $message = [
            'data' => [],
        ];

        foreach ($promotions as $promotion) {
            array_push($message['data'], PromotionResource::create($promotion));
        }

        return $this->toJson($message, Response::HTTP_OK);
    }
}

