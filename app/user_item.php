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
}
