<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use DB;
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
        'last_login'
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
        return $this->belongsToMany(Challenge::class, 'challenges_users');
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

        /**
     * [getFirstNameAttribute description]
     * @param  [type] $value [description]
     * @return [type]        [description]
     */
    public function getAvatarPathAttribute($value)
    {
        if(file_exists($value)){
            return $value;
        }else{
            return '/avatars/trash.jpg';
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

    public function getWasteByMonth()
    {

        $waste = Waste::thisYear()
        //->where('user_id', \Auth::user()->id)
         ->selectRaw('DATE_FORMAT(created_at, "%V") as mo, DATE_FORMAT(created_at, "%M") as month, sum(weight) as totalMonthlyWeight, sum(cost) as totalMonthlyCost')
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
        $waste = Waste::select(['id', 'description', 'waste_type_id', 'cost', 'weight', 'created_at'])
            ->where('user_id', \Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->take($take)
            ->get();

        return $waste;
    }

    public function getTypeList(){
        $ids=array();
        $weights=array();
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
