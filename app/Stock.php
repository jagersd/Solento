<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    /**
     * Get the user that owns the stock.
     */
    protected $guarded = array();

    protected $fillable = [
        'user_id','gold_amount','victory_points'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
