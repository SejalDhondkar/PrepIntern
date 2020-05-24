<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostInternshipDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_internship_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->bigInteger('profile_id')->unsigned()->nullable();
            $table->foreign('profile_id')->references('id')->on('internship_profiles');
            $table->text('type_of_internship')->nullable();
            $table->text('city_preferences')->nullable();
            $table->integer('applicants_from_sel_cities')->default(0);
            $table->integer('is_part_time_allowed')->nullable();
            $table->text('no_of_openings')->nullable();
            $table->text('start_date_type')->nullable();
            $table->text('start_date')->nullable();
            $table->text('end_date')->nullable();
            $table->text('internship_duration')->nullable();
            $table->text('intern_resp_desc')->nullable();
            $table->text('stipend_category')->nullable();
            $table->text('stipend_fixed')->nullable();
            $table->text('stipend_amount_min')->nullable();
            $table->text('stipend_amount_max')->nullable();
            $table->text('stipend_incentive')->nullable();
            $table->text('stipend_type')->nullable();
            $table->text('perks')->nullable();
            $table->integer('preplacement_offer')->default(0);
            $table->text('skills_id')->nullable();
            $table->text('question_1')->nullable();
            $table->text('question_2')->nullable();
            $table->text('other_req')->nullable();
            $table->integer('is_verified')->default(0);
            $table->timestamps();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_internship_details');
    }
}
