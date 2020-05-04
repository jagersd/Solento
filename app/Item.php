<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{   
    protected $table = 'items';
    protected $guarded = array();
    
    public function abilities()
    {
        return $this->hasMany(Item_stat::class,'item_id','id');
    }
}
