<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    //
    protected $fillable = [
        'name'
    ];

     public function waste(){
        return $this->belongsTo(Waste::class, 'waste_type_id'); 
    }

}
