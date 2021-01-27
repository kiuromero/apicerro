<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table = 'contact';
    /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'id','email','site','phone','cellphone','whatsapp','manager','adress', 'created_at'
     ];
}
