<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
