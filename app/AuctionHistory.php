<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionHistory extends Model
{
    protected $guarded = [];

    public function goods()
    {
        return $this->belongsTo(Goods::class, 'goods_id');
    }

    public function auction()
    {
        return $this->belongsTo(Auction::class, 'auction_id');
    }
}
