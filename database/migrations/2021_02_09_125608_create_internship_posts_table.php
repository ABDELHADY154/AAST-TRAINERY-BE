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
            $table->string('internship_title');
            $table->string('image');
            $table->date('published_on');
            $table->integer('vacancy');
            $table->string('gender');
            $table->string('type');
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
