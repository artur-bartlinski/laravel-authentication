<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public static function boot()
    {
        parent::boot();

        static::deleting(function($address) {
            if ($address->users()->count()) {
                return false;
            }
        });
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
