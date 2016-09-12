<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Point2Sell extends Model
{
    //
    public $timestamps=false;

    public function user()
    {
        return $this->hasOne(User::class,'user_id','user_id');
    }

    public function buy_user()
    {
        return $this->hasOne(User::class,'user_id','buy_user_id');
    }
}
