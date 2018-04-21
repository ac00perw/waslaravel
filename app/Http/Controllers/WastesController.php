<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Waste;
use App\Models\User;
use Carbon;
use Auth;
use Redirect;

class WastesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list =  Waste::select(['description', 'waste_type_id', 'user_id', 'cost', 'weight', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->take(100)
            ->get();

         return view('waste.index', compact('list') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('waste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\RecordWaste $request)
    {
        
        if (Auth::check()) {
            $waste = Waste::create([
                'description'=>$request->description, 
                'weight'=>$request->weight,
                'cost' => $request->cost,
                'waste_type_id' => $request->waste_type_id,
                'user_id' => Auth::user()->id,
                
            ]);
            

            return Redirect::back()->with('msg', 'Success.');
        }else{
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $waste = Waste::findOrFail($id);
        return view('waste.edit', compact('waste') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $waste = Waste::findOrFail($id);

         if($waste->user_id == \Auth::user()->id || \Auth::user()->is_admin == 1){
            $waste->update([
                'food_type_id' => $request->food_type_id,
                'weight' => $request->weight,
                'description' => $request->description,
                'cost' => $request->cost,
                'created_at' => Carbon\Carbon::parse($request->created_at),
                ]);

            return redirect('/home');
        }else{
             return redirect('home')->with('msg', 'You are not allowed to edit other people\'s entries!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
