<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller
{
    //

    public function about(){
    	$name="Food Waste, the Website";
    	$description="This website will help you keep track of your food waste.";
	    
    	return view('pages.about', compact('name', 'description') );
    }
}
