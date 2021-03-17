<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Officer;

class Level extends Model
{
    protected $guarded = [];

    public function officer()
    {
        return $this->hasOne(Officer::class);
    }
}
