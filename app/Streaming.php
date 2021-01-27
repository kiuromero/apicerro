<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Streaming extends Model
{
    protected $table = 'urlstreaming';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'id','url', 'created_at',
     ];
}
