<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInternshiPostForeignToStudentInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_interests', function (Blueprint $table) {
            $table->unsignedBigInteger('internship_post_id');
            $table->foreign('internship_post_id')->references('id')->on('internship_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_interests', function (Blueprint $table) {
            //
        });
    }
}
