<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('iso3')->nullable();
            $table->text('iso2')->nullable();
            $table->text('phonecode')->nullable();
            $table->text('capital')->nullable();
            $table->text('currency')->nullable();
            $table->timestamps();
            $table->integer('flag')->nullable();
            $table->text('wikiDataId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
