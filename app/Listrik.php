<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listrik extends Model
{
    protected $fillable = ['id_user', 'tanggal', 'token', 'status'];
}
