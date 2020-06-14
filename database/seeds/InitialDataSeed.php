<?php

use Illuminate\Database\Seeder;
use App\Http\Services\SeederService;

class InitialDataSeed extends Seeder
{
    public function run()
    {
        app(SeederService::class)->seedWrestlers();
        app(SeederService::class)->seedPromotions();
        app(SeederService::class)->seedWrestlingShows();
        app(SeederService::class)->seedWrestlersToShows();
        app(SeederService::class)->seedStates();
        app(SeederService::class)->seedWrestlerToStates();
    }
}
