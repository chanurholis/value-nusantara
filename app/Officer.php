<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Level;

class Officer extends Model
{
    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
