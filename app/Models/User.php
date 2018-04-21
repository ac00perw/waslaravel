<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
use Gravatar;
// use Carbon\Carbon;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'team_name',
        'team_description',
        'first_name', 
        'last_name', 
        'birthdate', 
        'city', 
        'state', 
        'zip', 
        'email', 
        'password', 
        'weight_scale', 
        'currency',
        'teammates',
        'team_type',
        'timezone',
        'avatar_path',
        'last_ip',
        'last_login',
        'avg_food_cost'
    ];
    protected $casts = [
        'options' => 'array',
    ];
    public $timestamps = true;

    public function challenges()
    {
        return $this->belongsToMany(Challenge::class, 'challenges_users');
    }

    public function waste()
    {
        return $this->hasMany(Waste::class); 
    }

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

    static function getTotalCost()
    {
         $user = User::find(1);
         $sum=array_sum( (array)$user->waste->cost );

    
     return $sum;
    }

        /**
     * [getFirstNameAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getAvatarPathAttribute($value)
    {
        if(file_exists($value)){
            return "/".$value;
        }else{
            return Gravatar::src($this->email) ;
            //return '/avatars/trash.jpg';
        }
    }

    public function scopeTeamType($query, $type='any')
    {
       
        if($type !='any'){
            return $query->having('team_type', '=', $type);    
        }else{
            return $query;
        }  
    }

    public function scopeAvailableUsers($query, $challenge_id)
    {
        $ids = DB::table('challenges_users')->where('challenge_id', '=', $challenge_id)->pluck('user_id');
        //dd($ids);
        return $query->whereNotIn('id', $ids);
    }

    public function scopeUserOrAuth($query, $user)
    {
        return $query->where('id', $user);
    }
    /**
     * Build out stats for charts
     * @param  [type] $start [description]
     * @param  [type] $end   [description]
     * @return [type]        [description]
     */
    public function getWasteByRange($start, $end)
    {
        $waste = Waste::where('user_id', $this->id)
             ->selectRaw('DATE_FORMAT(created_at, "%Y") as year, CONCAT(DATE_FORMAT(created_at, "%m"), DATE_FORMAT(created_at, "%d"))  as mo, DATE_FORMAT(created_at, "%b-%Y") as graphkeys, sum(weight) as totalMonthlyWeight, sum(cost) as totalMonthlyCost')
             ->range($start, $end)
             ->groupBy('mo')
             ->orderBy('year')
             ->orderBy('mo')

             ->orderBy('mo', 'asc')
             //->pluck('totalMonthlyCost', 'totalMonthlyWeight', 'mo')
             ->get();
         if (count($waste)> 0){

             foreach ($waste as $w) {
                $cost[]=$w->totalMonthlyCost;
                $weight[]=$w->totalMonthlyWeight;
                $keys[]=$w->graphkeys;
             }
        
        return array("cost" => $cost, "weight" => $weight, "keys" => $keys );
        }
    }

    public function getLastEntries($take = 20)    
    {

        $waste = Waste::select(['id', 'description', 'waste_type_id', 'cost', 'weight', 'created_at'])
            ->where('user_id', '=', $this->id)
            ->orderBy('created_at', 'desc')
            ->take($take)
            ->get();

        return $waste;
    }

    public function getTypeList(){
        $ids=array();
        $weights=array();
        $wastes=Waste::selectRaw('waste_type_id, sum(weight) as weight')
            ->where('user_id', $this->id)
            ->groupBy('waste_type_id')
            ->pluck('weight', 'waste_type_id');
            $w=Array();
        foreach($wastes as $k=>$v){
            $ids[]=WasteType::find($k)->name;            
            $weights[]=$v;
        }

        return array('ids'=>$ids, 'weights'=>$weights);
    }

    public function foodCostPerDay(){
        
        return round($this->avg_food_cost/30, 2);
    }

    public function percentageOfWaste($days, $cost){
        $dailyCost=$this->foodCostPerDay();
        $averageLoss=round($days/$cost, 2);
        //total days / (total food cost average per month/30 = total food cost per day )
        return round($averageLoss/$dailyCost * 100, 2);
    }
}
