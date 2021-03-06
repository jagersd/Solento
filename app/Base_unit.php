<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Base_unit extends Model
{
    Protected $guarded = [];
    protected $table = 'base_units';

    public function race()
    {
        return $this->belongsTo(Race::class,'race_id','id');
    }

    public function outfit()
    {
        return $this->belongsTo(outfit::class,'id','unit_id');
    }

    public function abilities()
    {
        return $this->hasMany(Unit_stat::class,'unit_id','id');
    }

}
