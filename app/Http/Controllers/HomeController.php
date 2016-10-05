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
    public function index($id=null)
    {
        
        if(!$id){
            $user=\Auth::user();
        }else{
            $user=User::where('id', $id)->first();
        }
        
        // get waste from this year for logged in user;
        
        
        $waste = $user->getWasteByMonth();
        $list = $user->getLastEntries(10);
        $types= $user->getTypeList();
        $wasteSum = Waste::wasteSum($user->id);
        
        return view('home', array('weight' => json_encode($waste['weight']), 
            'cost' => json_encode($waste['cost']), 
            'months' => json_encode($waste['months']), 
            'list' => $list,  
            'types' => json_encode($types['ids']), 
            'weights' => json_encode($types['weights']),
            'user' => $user,
            'wasteSum' => $wasteSum,
            ) );
    }
}
