<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base_unit extends Model
{
    Protected $guarded = [];

    public function race()
    {
        return $this->belongsTo(Race::class,'id','race_id');
    }
}
