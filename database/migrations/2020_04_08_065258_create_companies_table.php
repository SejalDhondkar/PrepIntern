<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->string('email')->unique();
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->text('contact_no'); 
            $table->text('country');
            $table->text('state')->nullable();
            $table->text('city')->nullable();
            $table->text('registered_address')->nullable();
            $table->text('pincode');
            $table->text('registration_no');
            $table->text('certificate_of_incorporation')->nullable();
            $table->text('website')->nullable();
            $table->text('year_of_establishment');
            $table->text('type_of_company')->nullable();
            $table->text('description')->nullable();
            $table->text('range_of_employees')->nullable();
            $table->string('is_verified')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
