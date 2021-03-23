<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auction;

class Goods extends Model
{
    protected $guarded = [];

    public function auction()
    {
        return $this->hasOne(Auction::class);
    }
}
