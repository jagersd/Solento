<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    protected $table = 'races';
    /**
     * race model
     */
    protected $guarded = array();

    protected $fillable = [
        'name','description'
    ];


}
