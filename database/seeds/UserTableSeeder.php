<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    $user = User::where('email', 'a@acdubs.com')->first();

        if (empty($user) ){
             User::create(
                array(
                    'first_name' => 'Adam',
                    'last_name' => 'Wood',
                    'team_name' => 'Team Coop',
                    'username' => 'cooper',
                    'email' => 'a@acdubs.com',
                    'city' => 'Burlington',
                    'state' => 'VT',
                    'zip' => '05403',
                    'birthdate' => '1970-11-20',
                    'timezone' => 'America/New_York',
                    'password' => Hash::make('keyhead'),
                    'teammates' => 1,
                    'team_description' => 'Just One Guy',
                    'team_description' => 'Individual'
                )
            ) ;
         
        factory(App\Models\User::class, 30)->create();
        }
    }
}
