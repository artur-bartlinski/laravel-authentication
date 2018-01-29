<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
