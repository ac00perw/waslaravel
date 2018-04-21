<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\Challenge;
use App\Helpers;

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

    public function scopeChallengeRange($query, $challenge, $user_id)
    {
        $start_date=$challenge->start_date;
        $end_date=$challenge->end_date;
            
        return $query->where([ ['user_id', '=', $user_id ], ['created_at', '>=', $start_date], ['created_at', '<=', $end_date] ]);
    }

  /**
   * [scopeSums description]
   * @param  [type] $query 
   * @return [type]        summed weight and cost
   */
    public function scopeSums($query){
      $query->selectRaw('sum(weight) as totalWeight, sum(cost) as totalCost');
    }

    /**
    * [scopeRange description]
    * @param  [db] $query 
    * @param  [type] $start range start
    * @param  [type] $end   range end
    * @return [type]        $query
    */
    public function scopeRange($query, $start, $end){
       return $query->where('created_at', '>=', $start)
         ->where('created_at', '<=', $end);
    }

    /**
    * [wasteSum description]
    * @param  [type] $id    user->id
    * @param  [type] $start [range start]
    * @param  [type] $end   [range end]
    * @return [array]       various analytics
    */
    public static function wasteSum($id=null, $start, $end){

        if (!$id){
            $user=User::find( \Auth::user()->id);
        }else{
            $user=User::find($id);
        }

        $wastes=Waste::where('user_id', '=', $user->id)
         ->selectRaw('count(id) as totalItems, SUM(cost) as totalCost, SUM(weight) as totalWeight ')
         ->range($start, $end)
         ->groupBy('user_id')
         ->get();

        $out=Array('totalItems' => 0, 'totalCost'=>0, 'totalWeight' =>0, 'days' => 1 );
        foreach ($wastes as $w){
            $out['totalItems']=$w->totalItems;
            $out['totalCost']=(!$w->totalCost ? 0 : $w->totalCost);
            $out['totalWeight']=$w->totalWeight;
            
        }

        $days=Carbon::parse($start)->startOfDay()->diffInDays(Carbon::parse($end));
        $out['days']=($days==0 ? 1 : $days  );
        return $out;
    }

    public static function getWasteList(){
        $out=Array(null => "Select...");
        $wastes=WasteType::pluck('name', 'id');
        foreach($wastes as $k=>$v){
            $out[$k]=$v;
            
        }
        return $out;
    }

    static function getFirstWaste($user_id)
    {
        $waste=Waste::where('user_id', '=', $user_id)
        ->orderBy('created_at')->first();
        return Carbon::parse($waste->created_at);
    }

}
