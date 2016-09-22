<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //
    protected $fillable = [
        'name', 'longitude', 'latitude'
    ];

    public function users(){
        return $this->hasMany(User::class); 
    }

    public function challenge(){
    	return $this->belongsTo(Challenge::class);
    }
}
