<?php

use Illuminate\Database\Seeder;
Use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     App\Models\User::unguard();

	  $this->call(UserTableSeeder::class);
        App\Models\User::reguard();
      $this->call(WasteTableSeeder::class);
      $this->call(ChallengeTableSeeder::class);

	  
    }
}
