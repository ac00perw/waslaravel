<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    //
    protected $dates = ['start_date', 'end_date'];

    public function users()
    {
    	return $this->hasMany(User::class);
    }
}
