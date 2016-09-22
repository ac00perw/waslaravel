<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'birthdate', 'city', 'state', 'email', 'password', 'weight_scale', 'currency'
    ];
    protected $casts = [
        'options' => 'array',
    ];
    public $timestamps = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAge()
    {
        if ($this->birthdate){
            $bd=explode("-", $this->birthdate);
            return \Carbon\Carbon::createFromDate($bd[0], $bd[1], $bd[2])->age;
        }else{
            return "unknown";
        }
    }

    public function challenge()
    {
        return $this->belongsTo(Challenge::class);
    }

    public function waste()
    {
        return $this->hasMany(Waste::class); 
    }

    public function getID()
    {
        return Auth::user()->getId();
    }

    static function getTotalCost()
    {
         $user = User::find(1);
         $sum=array_sum( (array)$user->waste->cost );

    
     return $sum;
    }

    public function getWasteByMonth()
    {

        $waste = Waste::thisYear()
         ->selectRaw('DATE_FORMAT(created_at, "%m") as mo, DATE_FORMAT(created_at, "%M") as month, sum(weight) as totalMonthlyWeight, sum(cost) as totalMonthlyCost')
         ->groupBy('mo')
         ->orderBy('mo', 'asc')
         //->pluck('totalMonthlyCost', 'totalMonthlyWeight', 'mo')
         ->get();
         if (count($waste)> 0){

             foreach ($waste as $w) {
                $cost[]=$w->totalMonthlyCost;
                $weight[]=$w->totalMonthlyWeight;
                $months[]=$w->month;
             }
        
        return array("cost" => $cost, "weight" => $weight, "months" => $months );
        }
    }

    public function getLastEntries($take = 20)    
    {
        $waste = Waste::select(['description', 'waste_type_id', 'cost', 'weight', 'created_at'])
            ->orderBy('created_at', 'desc')
            ->take($take)
            ->get();

        return $waste;
    }

    public function getTypeList(){
        $wastes=Waste::where('user_id', '=', \Auth::user()->id)
            ->selectRaw('waste_type_id, sum(weight) as weight')
            ->groupBy('waste_type_id')
            ->pluck('weight', 'waste_type_id');
            $w=Array();
        foreach($wastes as $k=>$v){
            $ids[]=WasteType::find($k)->name;            
            $weights[]=$v;
        }

        return array('ids'=>$ids, 'weights'=>$weights);
    }

    
}
