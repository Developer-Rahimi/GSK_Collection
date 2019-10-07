<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cache extends Model
{
    protected $fillable =[
        'url','data','created_at','update_at'
    ];
    public $timestamps = false;
}
