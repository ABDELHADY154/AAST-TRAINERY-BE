<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('image')->default('default.png');
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('reg_no');
            $table->integer('period')->nullable();
            $table->float('gpa')->nullable();
            $table->integer('start_year')->nullable();
            $table->integer('end_year')->nullable();
            $table->string('gender');
            $table->date('date_of_birth')->nullable();
            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->longText('university')->nullable(); //
            $table->string('phone_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('students');
    }
}
