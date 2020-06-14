<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInitialTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->createWrestlersTable();
        $this->createWrestlingPromotionsTable();
        $this->createWrestlingShowsTable();
        $this->createWrestlerStatesTable();
        $this->createWrestlersToPromotionsTable();
        $this->createWrestlersToShowsTable();
        $this->createWrestlersToStatesTable();
        $this->createShowsToPromotionsTable();
    }

    private function createWrestlersTable()
    {
        Schema::create('wrestlers', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->string('forename')->nullable();
            $table->string('middle_names')->nullable();
            $table->string('surname')->nullable();
            $table->string('ring_name')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('active')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('date_of_death')->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlingPromotionsTable()
    {
        Schema::create('wrestling_promotions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('founded')->nullable();
            $table->string('active')->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlingShowsTable()
    {
        Schema::create('wrestling_shows', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->string('name')->nullable();
            $table->bigInteger('promotion_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlerStatesTable()
    {
        Schema::create('wrestler_states', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->string('name')->nullable();
            $table->string('colour')->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlersToPromotionsTable()
    {
        Schema::create('wrestlers_to_promotions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->bigInteger('wrestler_id')->unsigned()->nullable();
            $table->bigInteger('promotion_id')->unsigned()->nullable();
            $table->dateTime('date_joined')->nullable();
            $table->dateTime('date_left')->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlersToShowsTable()
    {
        Schema::create('wrestlers_to_shows', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->bigInteger('wrestler_id')->unsigned()->nullable();
            $table->bigInteger('show_id')->unsigned()->nullable();
            $table->dateTime('date_joined')->nullable();
            $table->dateTime('date_left')->nullable();
            $table->timestamps();
        });
    }

    private function createWrestlersToStatesTable()
    {
        Schema::create('wrestlers_to_states', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->bigInteger('wrestler_id')->unsigned()->nullable();
            $table->bigInteger('state_id')->unsigned()->nullable();
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();
        });
    }

    private function createShowsToPromotionsTable()
    {
        Schema::create('shows_to_promotions', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->uuid('uuid');
            $table->bigInteger('show_id')->unsigned()->nullable();
            $table->bigInteger('promotion_id')->unsigned()->nullable();
            $table->timestamps();
        });
    }
}
