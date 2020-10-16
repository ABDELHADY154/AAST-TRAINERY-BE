<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfileAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_accounts', function (Blueprint $table) {
            $table->id();
            $table->longText('account_url_instagram')->nullable();
            $table->longText('account_url_facebook')->nullable();
            $table->longText('account_url_youtube')->nullable();
            $table->longText('account_url_linkedin')->nullable();
            $table->longText('account_url_github')->nullable();
            $table->longText('account_url_behance')->nullable();
            $table->unsignedBigInteger('student_id');
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
        Schema::dropIfExists('profile_accounts');
    }
}
