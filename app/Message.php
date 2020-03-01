<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['message', 'userId', 'orderId'];
    public function user()
    {
        return $this->belongsTo('App\User', 'sysId');
    }

    public function orders()
    {
        return $this->belongsTo('App\Order', 'refId');
    }
}
