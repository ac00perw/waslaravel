<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChallengesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges_users', function (Blueprint $table) {
            $table->integer('challenge_id')->unsigned();
            $table->integer('user_id')->unsigned();            

            $table->foreign('challenge_id')
                    ->references('id')
                    ->on('challenges')
                    ->onDelete('cascade');
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
         Schema::drop('challenges_users');
    }
}
