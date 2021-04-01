<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignTrainingAdvisorToInternshipPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('internship_posts', function (Blueprint $table) {
            $table->unsignedBigInteger('training_advisor_id')->nullable();
            $table->foreign('training_advisor_id')->references('id')->on('training_advisors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('internship_posts', function (Blueprint $table) {
            //
        });
    }
}
