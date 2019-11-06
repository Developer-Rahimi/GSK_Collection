<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable =[
        'Review','Datetime'
    ];
    public $timestamps = false;
}
