<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class outfit extends Model
{
    //
    protected $table = 'outfits';
    protected $guarded = array();

    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }

}
