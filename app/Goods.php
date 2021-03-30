<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Auction;
use App\Traits\Uuid;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Goods extends Model
{
    use SoftDeletes;
    use Uuid;

    protected $guarded   = [];
    public $incrementing = false;

    public function auction()
    {
        return $this->hasOne(Auction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
