<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['purpose', 'typeofservice', 'levels', 'typeofproject', 'pagecount',
    'spacing', 'spell', 'writer',];
}
