<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_item extends Model
{
    protected $table = 'user_items';
    /**
     * Add special abilities to a unit
     */
    protected $guarded = array();

    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }

    public function item()
    {
        return $this->belongsTo(Item::class,'item_id','id');
    }
}
