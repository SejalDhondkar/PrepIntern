<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentGraduationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_graduation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->text('status')->nullable();
            $table->bigInteger('college_id')->unsigned()->nullable();
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->text('start_year')->nullable();
            $table->text('end_year')->nullable();
            $table->bigInteger('degree_id')->unsigned()->nullable();
            $table->foreign('degree_id')->references('id')->on('degrees');
            $table->bigInteger('stream_id')->unsigned()->nullable();
            $table->foreign('stream_id')->references('id')->on('streams');
            $table->text('gpa_score')->nullable();
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
        Schema::dropIfExists('student_graduation_details');
    }
}
