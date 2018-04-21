<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeChallengeUsersColumnsUniqueIndex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('challenges_users', function ($table) {
            $table->dropForeign('challenges_users_user_id_foreign');
            $table->unique(array('challenge_id', 'user_id'), 'both_columns');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challenges_users', function ($table) {
            
            $table->dropUnique('both_columns'); // Drops index 'geo_state_index'
        });
    }
}
