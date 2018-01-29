<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function title()
    {
        return $this->belongsTo('App\Title');
    }

    public function gender()
    {
        return $this->belongsTo('App\Gender');
    }

    public function addresses()
    {
        return $this->belongsToMany('App\Address');
    }


}
