<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('delete_this_id')->nullable();
          $table->text('name');
          $table->bigInteger('state_id')->unsigned();
          $table->foreign('state_id')->references('id')->on('states');
          $table->text('state_code')->nullable();
          $table->bigInteger('country_id')->unsigned();
          $table->foreign('country_id')->references('id')->on('countries');
          $table->text('country_code')->nullable();
          $table->text('latitude')->nullable();
          $table->text('longitude')->nullable();
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
        Schema::dropIfExists('cities');
    }
}
