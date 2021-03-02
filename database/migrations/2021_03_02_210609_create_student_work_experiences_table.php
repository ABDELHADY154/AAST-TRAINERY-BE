<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('experience_type');
            $table->string('job_title');
            $table->string('company_name');
            $table->string('company_website')->nullable();
            $table->string('country');
            $table->string('city');
            $table->date('from');
            $table->date('to');
            $table->boolean('currently_work');
            $table->string('cred_url')->nullable();
            $table->string('cred')->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_work_experiences');
    }
}
