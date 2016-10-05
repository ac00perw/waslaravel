<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use App\Models\Challenge;
use App\Models\Waste;
use App\Helpers\Helper;
use Carbon;
use Auth;
use Mail;
use Session;
use DB;

class ChallengesController extends Controller
{
    //start a new challenge
    //name
    //description
    //start time
    //challenge type?
    //Solo/single team/personal best, 2-team, multi-team
    //
    //
    public function create()
    {
		$user = User::findOrFail(\Auth::user()->id);
        return view('challenge.create', compact('user') );
    }

    /**
     * [prepareChallenge description]
     * @return [type] [description]
     */
    public function prepareChallenge(Request $request, $id)
    {
        $challenge=Challenge::findOrFail( (int)$request->input('challenge') );
        $user=User::findOrFail($id);

        return view('challenge.prepare', compact('user', 'challenge') );

    }

    public function sendChallenge()
    {
    	$user = User::findOrFail(\Auth::user()->id);
		\Mail::send('emails.challenge',
	        array(
	            'name' => $user->team_name,
	            'email' => $user->email,
	            'user_message' => 'this is a test'
	        ), function($message)
	    {
	        $message->from('a@acdubs.com');
	        $message->to('a@acdubs.com', 'Admin')->subject('You have been challenged on WasteLandr ');
	    });
			return view('challenge.sent' );
    }

    /**
     * edits challenges
     * @return [type] [description]
     */
    public function edit($id)
    {

		$challenge = Challenge::findOrFail($id);
		if($challenge->owner_id == \Auth::user()->id)
        {
            return view('challenge.edit', compact('challenge') );
        }else{
            Session::flash('message', "You do not have permission to edit that page.");
            return \Redirect::back();

            //return Redirect::back()->withErrors(['msg', 'The Message']);

        }
    }  

    /**
     * Search for a team by username, name, or email address to add them to a challenge.
     */
    public function addTeamToChallenge($id)
    {
        $challenge = Challenge::findOrFail($id);
        return view('challenge.addTeam', compact('challenge') );
    }

    /**
     * Get user list for adding teams
     */
    public function getUserList(Request $request){
        $team_type=$request->input('team_type');
        $term=$request->input('term');
        $challenge_id=$request->input('challenge_id');


        if(strlen($term) > 0)
        {
            $term="%". $term ."%";
            $users=User::availableUsers($challenge_id)
            ->select("id", "avatar_path", "team_name", "team_type", "city", "state")
                
              //  ->Where('email', 'LIKE', $term)
                
                ->where(function ($query) use ($term) {
                    $query->orWhere('team_name', 'LIKE', $term)
                      ->orWhere('last_name', 'LIKE', $term)
                      ->orWhere('state', 'LIKE', $term)
                      ->orWhere('city', 'LIKE', $term);
                })
                //->orWhere('last_name', 'LIKE', $term)
               // ->orWhere('username', 'LIKE', $term)
                //->orWhere('state', 'LIKE', $term)
               // ->orWhere('city', 'LIKE', $term)
                ->teamType($team_type)
                ->get();
/*

public function availableItems()
{
    $ids = \DB::table('item_user')->where('user_id', '=', $this->id)->lists('user_id');
    return \Item::whereNotIn('id', $ids)->get();
}
 */
        
            return $users;
        }else{
              return json_encode("Please search change");  
        }
    }

	/*
	 * update challenges
	 * @param  [type]  $id      [description]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function update($id, Requests\NewChallenge $request)
    {
        //
            $challenge = Challenge::findOrFail($id);
            $challenge->update([
            	'name' => $request->name, 
            	'description' => $request->description, 
            	'start_date' => $request->start_date,
            	'end_date' => $request->end_date,
            	'updated_at' => Carbon\Carbon::now()
            	]);

        return redirect('/challenges');
    }

    /**
     * 
     */
	public function index(){
		$list = \Auth::user()->challenge;

		return view('challenge.index', compact('list') );
	}

    /**
     * grab json stats based on id
     * @param  Challenge $id [description]
     * @return 
     */
    public function stats($id){
        //get challenge
        $challenge=Challenge::findOrFail($id);//->challengeRange($id);
        $users=$challenge->users;
        $waste = array();

        foreach($users as $u){
             $waste[$u->id]=Waste::ChallengeRange($challenge, $u->id)->Sums()->first();
        }

        //dd($users);
        return $waste;
    }
    
     /**
     * Store a newly created challenge
     *
     */
    public function store(Requests\NewChallenge $request)
    {
        
        if (Auth::check()) {
            $challenge = Challenge::create([
                'description'=>$request->description, 
                'name'=>$request->name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'owner_id' => \Auth::user()->id
            ]);

            if (Challenge::find($challenge->id)){
				$challenge->users()->attach( \Auth::user()->id );
				//to remove:
				//$challenge->users()->detach(id);
				//all users:
				//$challenge->users()->detach();
				$challenge->save();
            	print "success";
            }
            return redirect('/challenges');
        }else{
            return redirect('/');
        }
    }

    public static function contestIsRunning($id){
    	 $challenge = Challenge::findOrFail($id);

        if($challenge->status == 'active'){
    	 	return true;
    	 }else{
    	 	return false;
    	 }
    }
}