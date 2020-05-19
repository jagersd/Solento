<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     * Get the stock record associated with the user.
     */
    public function stock()
    {
        return $this->hasOne('App\Stock','user_id');
    }

    /**
     * 
     * Get the userrace record associated with the user.
     */
    public function user_race_combination()
    {
        return $this->hasOne('App\User_race','user_id');
    }

    /**
     * 
     * Get the outfit records associated with the user.
     */
    public function outfit()
    {
        return $this->hasMany(outfit::class,'user_id');
    }

        /**
     * 
     * Get the user_item records associated with the user.
     */
    public function user_item()
    {
        return $this->hasMany(user_item::class,'user_id');
    }
    
}

