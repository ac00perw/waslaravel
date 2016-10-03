<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Waste extends Model
{


    protected $fillable = [
        'description', 
        'cost',
        'waste_type_id',
        'user_id',
        'weight',
        'created_at'
    ];
    public $timestamps = true;

    
    public function user(){
        return $this->belongsTo(User::class); 
    }

    public function wasteType(){
	    return $this->hasMany(WasteType::class); 	
    }

    public function scopeThisYear($query)
    {
		return $query->where('created_at', '>=', Carbon::NOW()->firstOfYear() );
    }

    static function wasteSum($id=null){

        if (!$id){
            $user=User::find( \Auth::user()->id);
        }else{
            $user=User::find($id);
        }
        $wastes=Waste::where('user_id', '=', $user->id)
         ->selectRaw('count(id) as totalItems, SUM(cost) as totalCost, SUM(weight) as totalWeight ')
         ->groupBy('user_id')
         ->get();

        $out=Array('totalItems' => 0, 'totalCost'=>0, 'totalWeight' =>0, 'days' => Carbon::parse($user->created_at)->diffInDays(Carbon::now()) );
        foreach ($wastes as $w){
            $out['totalItems']=$w->totalItems;
            $out['totalCost']=($w->totalCost ? 0 : $w->totalCost);
            $out['totalWeight']=$w->totalWeight;
            $out['days']=($out['days']==0) ? 1 : $out['days'];
        }
        return $out;
    }

    static function getWasteList(){
        $out=Array(null => "Select...");
        $wastes=WasteType::pluck('name', 'id');
        foreach($wastes as $k=>$v){
            $out[$k]=$v;
            
        }
        return $out;
    }

   

}
