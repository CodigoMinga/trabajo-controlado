<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'name', 'phone', 'address', 'email'];
}
