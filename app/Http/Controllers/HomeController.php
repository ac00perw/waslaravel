<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Models\Waste;
use App\Models\User;
use Carbon\Carbon;
//use App\Http\Controllers\UsersController;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null, $range_start=null, $range_end=null)
    {
        
        if(!$id){
            $user=\Auth::user();
        }else{
            $user=User::where('id', $id)->first();
        }
        if(!$range_start){
            $range_start=Carbon::parse($user->created_at);
        }
        if(!$range_end){
            $range_end=Carbon::now($user->timezone, 'Y-m-d');
        }
        
        $waste = $user->getWasteByRange($range_start, $range_end);
        $list = $user->getLastEntries(10);
        $types= $user->getTypeList();
        $wasteSum = Waste::wasteSum($user->id, $range_start, $range_end);
        
        return view('home', array('weight' => json_encode($waste['weight']), 
            'cost' => json_encode($waste['cost']), 
            'keys' => json_encode($waste['keys']), 
            'list' => $list,  
            'types' => json_encode($types['ids']), 
            'weights' => json_encode($types['weights']),
            'user' => $user,
            'wasteSum' => $wasteSum,
            'start' => $range_start,
            'end' => $range_end,
            ) );
    }
}
