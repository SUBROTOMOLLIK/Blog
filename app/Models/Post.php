<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable =[
        'user_id',
        'cate_id',
        'title',
        'thumb',
        'full_img',
        'detail',
        'tags',
    ];

    function comments(){
      return $this->hasMany('App\Models\Comment')->orderBy('id','desc');
    }
    function category(){
      return $this->belongsTo('App\Models\Category','cate_id');
    }
}
