<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChallengesToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges_to_users', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned()->unique();
            $table->integer('user_id')->unsigned();

            $table->foreign('challenge_id')
                    ->references('id')
                    ->on('challenges');
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::disableForeignKeyConstraints();
         Schema::drop('challenges_to_users');
    }
}
