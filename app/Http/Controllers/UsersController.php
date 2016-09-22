<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Waste;
use App\Http\Controllers\Controller;
use Carbon;

class UsersController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
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
        return view('user.edit', compact('user') );
    }

    public function update($id, Request $request)
    {
        //
            $user = User::findOrFail($id);
            $user->update([
            	'last_name' => $request->last_name, 
            	'city' => $request->city, 
            	'state' => $request->state, 
            	'birthdate' => $request->birthdate, 
            	'weight_scale' => $request->weight_scale, 
            	'currency' => $request->currency,
            	'updated_at' => Carbon\Carbon::now()
            	]);

        return redirect()->back();
    }

	

}
