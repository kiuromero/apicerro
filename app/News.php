<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','tittle', 'content', 'image', 'created_at',
    ];
}