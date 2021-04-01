<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_advisors', function (Blueprint $table) {
            $table->id();
            $table->string('advisor_name');
            $table->string('advisor_title');
            $table->string('advisor_image');
            $table->longText('advisor_bio')->nullable();
            $table->string('advisor_email')->unique();
            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('student_departments');
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
        Schema::dropIfExists('training_advisors');
    }
}
