<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Challenge;
use App\Models\User;

class ChallengeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $challenge = User::find(1)->challenge;

       if (empty($challenge) ){
	        
		    $start=Carbon::now()->subWeek(1);
		    $end=Carbon::now()->addWeek(6);
		    

	        $a= Challenge::create(
	                array(
	                    'description' => 'Fake Challenge',
	                    'name' => 'Wood',
	                    'owner_id' => App\Models\User::find(1)->id,
				        'start_date' => $start,
				        'end_date' => $end,
	                )
	            ) ;
	        $a->users()->attach(App\Models\User::find(1) );
	        print 'Coop Challenge created';
		}
		factory(Challenge::class, 10)->create()->each(function($challenge){ 
			$challenge->users()->attach( App\Models\User::all()->random(1) );
		});
    }
}
