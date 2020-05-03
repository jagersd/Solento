<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Base_unit;

class Unit_stat extends Model
{
    protected $table = 'unit_stats';
    /**
     * Add special abilities to a unit
     */
    protected $guarded = array();

    public function base_unit()
    {
        return $this->belongsTo(Base_unit::class,'id','unit_id');
    }
}
