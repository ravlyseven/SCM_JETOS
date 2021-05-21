<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('*');

    public function orderdetail()
    {
        return $this->hasMany('App\Orderdetail', 'order_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
