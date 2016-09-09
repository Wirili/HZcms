<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey='user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['parent_name','child_count'];

    public $timestamps=false;

    public function parent()
    {
        return $this->hasOne(User::class,'user_id','parent_id');
    }

    public function children()
    {
        return $this->hasMany(User::class,'parent_id','user_id');
    }

    public function getParentNameAttribute()
    {
        return $this->parent->name??'';
    }

    public function getChildCountAttribute()
    {
        return $this->children()->where('is_pass',1)->count();
    }
}
