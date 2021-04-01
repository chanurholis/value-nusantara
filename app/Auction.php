<?php

namespace App;

use App\User;
use App\Goods;
use App\Officer;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Auction extends Model
{
    use Uuid;
    use SoftDeletes;

    protected $guarded   = [];
    public $incrementing = false;

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
