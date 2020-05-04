<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item_stat extends Model
{
    protected $table = 'item_stats';
    /**
     * Add special abilities to a unit
     */
    protected $guarded = array();

    public function Item()
    {
        return $this->belongsTo(Item::class,'id','item_id');
    }
}
