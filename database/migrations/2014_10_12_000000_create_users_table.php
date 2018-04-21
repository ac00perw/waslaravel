<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\User;
//use Carbon;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('team_name', 75);
            $table->string('username', 20);
            $table->string('team_description', 200);
            $table->string('avatar_path', 200);
            $table->integer('teammates')->default(1);
            $table->string('team_type', 25);
            $table->string('email')->unique();
            $table->string('password');
            $table->string('city', 50)->default('');
            $table->string('state', 2)->default('');
            $table->string('zip', 10)->default('');
            $table->string('timezone', 40);
            $table->date('birthdate');
            $table->string('currency', 50)->default('US Dollars');
            $table->enum('weight_scale', ['imperial', 'metric'] )->default('imperial');
            $table->ipAddress('last_ip');
            $table->datetime('last_login');
            $table->rememberToken();  
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
        Schema::disableForeignKeyConstraints();
        Schema::drop('users');
    }
}
