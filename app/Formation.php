<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    Protected $guarded = [];
    protected $table = 'formations';

    public function outfits()
    {
        return $this->belongsTo(outfit::class,'position','id');
    }
}
