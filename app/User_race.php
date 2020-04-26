<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_race extends Model
{
    protected $table = 'user_race';
    /**
     * Get the user / race combination (hopefully).
     */
    protected $guarded = array();

    protected $fillable = [
        'user_id','race_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
