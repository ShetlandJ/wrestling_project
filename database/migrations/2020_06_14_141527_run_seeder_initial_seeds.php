<?php

use Illuminate\Database\Migrations\Migration;

class RunSeederInitialSeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        (new InitialDataSeed())->run();
    }
}
