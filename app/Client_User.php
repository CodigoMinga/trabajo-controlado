<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client_User extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'client_id','user_id'];
}
