<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Challenge extends Model
{
    //
    protected $fillable = [
        'description', 
        'name',
        'start_date',
        'end_date',
        'owner_id'
    ];
    public $timestamps = true;
    //protected $casts = ['start_date' => 'date', 'end_date' => 'date'];

    public function users()
    {
    	return $this->belongsToMany(User::class, 'challenges_users');
    }

    public function getSlug()
    {
        return str_slug($this->id.'-'.$this->name, '-');
    }
}
