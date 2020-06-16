<?php

namespace App\Http\Services;

use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use App\Models\Wrestler;
use App\Models\WrestlerState;
use App\Models\WrestlingShow;
use App\Models\WrestlerToShow;
use App\Http\Services\ShowService;
use App\Models\WrestlingPromotion;
use App\Http\Services\StateService;
use App\Http\Services\WrestlerService;
use App\Http\Services\PromotionService;
use App\Models\ShowToPromotion;

class SeederService {
    public function seedWrestlers()
    {
        $seth = new Wrestler();
        $seth->uuid = (string) Uuid::uuid4();
        $seth->forename = "Colby";
        $seth->surname = "Lopez";
        $seth->ring_name = "Seth Rollins";
        $seth->slug = 'seth-rollins';
        $seth->active = 1;

        $seth->save();

        $roman = new Wrestler();
        $roman->uuid = (string) Uuid::uuid4();
        $roman->forename = "Leati";
        $roman->surname = "Anao'i";
        $roman->ring_name = "Roman Reigns";
        $roman->slug = 'roman-reigns';
        $roman->active = 1;

        $roman->save();
    }

    public function seedPromotions()
    {
        $wwe = new WrestlingPromotion();
        $wwe->uuid = (string) Uuid::uuid4();
        $wwe->name = "World Wrestling Entertainment";
        $wwe->alias = "WWE";
        $wwe->active = true;
        $wwe->founded = 1980;
        $wwe->description = 'WWE is the largest global professional wrestling organisation. Previously known as WWWF and WWF, the WWE runs weekly shows through its two main products, RAW and Smackdown.';
        $wwe->save();
    }

    public function seedWrestlingShows()
    {
        $raw = new WrestlingShow();
        $wwe = app(PromotionService::class)->findByAlias('WWE');

        $raw->uuid = (string) Uuid::uuid4();
        $raw->name = 'Raw';
        $raw->promotion_id = $wwe->id;

        $raw->save();
    }

    public function seedWrestlersToShows()
    {
        $seth = app(WrestlerService::class)->findByName('Seth Rollins');
        $raw = app(ShowService::class)->findByName('Raw');

        $sethToWWE = new WrestlerToShow();
        $sethToWWE->uuid = (string) Uuid::uuid4();
        $sethToWWE->wrestler_id = $seth->id;
        $sethToWWE->show_id = $raw->id;
        $sethToWWE->save();
    }

    public function seedShowsToPromotions()
    {
        $wwe = app(PromotionService::class)->findByAlias('WWE');
        $raw = app(ShowService::class)->findByName('Raw');

        $rawToWWE = new ShowToPromotion();
        $rawToWWE->uuid = (string) Uuid::uuid4();
        $rawToWWE->show_id = $raw->id;
        $rawToWWE->promotion_id = $wwe->id;
    }

    public function seedStates()
    {
        $states = array(
            array("name" => "Face", "colour" => '#93c47d'),
            array("name" => "Heel", "colour" => '#e06666'),
            array("name" => "Tweener", "colour" => '#ffe599'),
            array("name" => "Unclear", "colour" => '#b4a7d6'),
            array("name" => "Inactive", "colour" => '#b7b7b7')
        );

        foreach ($states as $state) {
            $wrestlerState = new WrestlerState();
            $wrestlerState->uuid = (string) Uuid::uuid4();
            $wrestlerState->name = $state['name'];
            $wrestlerState->colour = $state['colour'];
            $wrestlerState->save();
        }
    }

    public function seedWrestlerToStates()
    {
        $seth = app(WrestlerService::class)->findByName('Seth Rollins');
        $heel = app(StateService::class)->findByName('Heel');
        $face = app(StateService::class)->findByName('Face');

        app(StateService::class)->createNewWrestlerState(
            $wrestler_id = $seth->id,
            $state_id = $heel->id,
            $start = Carbon::create(2012, 11, 18),
            $url = null,
            $title = 'Shield Raw Invasion',
            $description = 'Rollins made his main roster debut as a heel alongside Dean Ambrose and Roman Reigns, attacking Ryback during the triple threat main event for the WWE Championship, allowing CM Punk to pin John Cena and retain the title.'
        );

        app(StateService::class)->createNewWrestlerState(
            $wrestler_id = $seth->id,
            $state_id = $face->id,
            $start = Carbon::create(2014, 3, 17),
            $url = null,
            $title = 'The Shield turn face',
            $description = 'The Shield turn on Kane.'
        );

        app(StateService::class)->createNewWrestlerState(
            $wrestler_id = $seth->id,
            $state_id = $heel->id,
            $start = Carbon::create(2014, 6, 2),
            $url = null,
            $title = 'Rollins betrays the shield',
            $description = 'The shield implodes as Rollins attacks Roman Reigns and Dean Ambrose, siding with The Authority in the process.'
        );
    }
}