<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Waste;
use App\Http\Controllers\Controller;
use Carbon;
use DateTimeZone;
use App\Routes;

class UsersController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
     if (\Auth::check() ){
       $this->show(\Auth::user() );
     }   
    }
    //
    public function show(User $user)
    {
		return view('user.profile', compact('user') );
    }

	public function store(Request $request)
	{
		$input = $request::all();
		User::create($input);	
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        $timezonelist = \DateTimeZone::listIdentifiers(DateTimeZone::ALL);

        return view('user.edit', compact('user', 'timezonelist') );
    }

    public function update($id, Request $request)
    {
        //
            $user = User::findOrFail($id);
            $user->update([
                'team_description' => $request->team_description, 
            	'team_name' => $request->team_name, 
                'first_name' => $request->first_name, 
                'last_name' => $request->last_name, 
            	'city' => $request->city, 
            	'state' => $request->state, 
            	'birthdate' => $request->birthdate, 
            	'weight_scale' => $request->weight_scale, 
            	'teammates' => $request->teammates,
                'team_type' => $request->team_type,
                'currency' => $request->currency,
            	'updated_at' => Carbon\Carbon::now(),
                'timezone' => $request->timezone,
                'avg_food_cost' => $request->avg_food_cost
            	]);
        $request->session()->flash('msg', 'Profile update successful.');
        return view('user.profile', compact('user') );
    }	

}
