<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base_unit extends Model
{
    Protected $guarded = [];
    protected $table = 'base_units';

    public function race()
    {
        return $this->belongsTo(Race::class,'id','race_id');
    }

    public function outfit()
    {
        return $this->belongsTo(outfit::class,'id','unit_id');
    }

}
