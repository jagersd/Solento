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

    public function base_details()
    {
        return $this->hasOne(Base_unit::class,'id','unit_id');
    }


}
