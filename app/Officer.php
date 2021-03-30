<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Level;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Officer extends Authenticatable
{
    protected $guarded = [];

    protected $hidden  = [
        'password', 'remember_token'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
