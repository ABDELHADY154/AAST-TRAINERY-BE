<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternshipPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internship_posts', function (Blueprint $table) {
            $table->id();
            $table->string('internship_title')->nullable();
            $table->string('sponser_image')->nullable();
            $table->date('published_on')->nullable();
            $table->integer('vacancy')->nullable();
            $table->string('gender')->nullable();
            $table->string('type')->nullable();
            $table->string('salary')->nullable();
            $table->date('application_deadline')->nullable();
            $table->longText('location')->nullable();
            $table->longText('desc')->nullable();
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
        Schema::dropIfExists('internship_posts');
    }
}
