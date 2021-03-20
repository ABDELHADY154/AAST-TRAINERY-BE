<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToStudentDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_departments', function (Blueprint $table) {
            $table->unsignedBigInteger('university_id');
            $table->foreign('university_id')->references('id')->on('student_universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_departments', function (Blueprint $table) {
            //
        });
    }
}
