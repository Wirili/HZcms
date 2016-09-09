<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ArticleCat extends Model
{
    //
    protected $primaryKey='cat_id';
    public $timestamps=false;
    protected $fillable=['sort_order'];

    public function articles()
    {
        return $this->hasMany(Article::class,'cat_id','cat_id');
    }
}
