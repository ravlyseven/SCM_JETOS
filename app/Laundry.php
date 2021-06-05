<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
    protected $table = 'laundrys';
    protected $fillable = array('*');

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
