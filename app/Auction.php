<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Goods;
use App\User;
use App\Officer;

class Auction extends Model
{
    protected $guarded = [];

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function officer()
    {
        return $this->belongsTo(Officer::class, 'officer_id');
    }
}
