<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $fillable = array('*');

    public function order()
    {
        return $this->belongsTo('App\Order', 'order_id');
    }
    public function menu()
    {
        return $this->belongsTo('App\Menu', 'menu_id');
    }
}
