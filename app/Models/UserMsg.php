<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserMsg extends Model
{
    //
    public $timestamps=false;
    protected $fillable=['user_id','to_user_id','info','type','ip','add_time'];


    public function user()
    {
        return $this->hasOne(User::class,'user_id','user_id');
    }

    public function touser()
    {
        return $this->hasOne(User::class,'user_id','to_user_id');
    }

    public function getUserNameAttribute()
    {
        return empty($this->user_id)?$this->type:$this->user->name;
    }

    public function getToUserNameAttribute()
    {
        return empty($this->to_user_id)?$this->type:$this->touser->name;
    }

    public static function create(array $attributes = [])
    {
        $attributes['ip']=array_get($attributes,'ip',\Request::getClientIp());
        $attributes['add_time']=array_get($attributes,'add_time',date('Y-m-d H:i:s'));
        return parent::create($attributes);
    }
}
