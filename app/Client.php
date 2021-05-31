<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'name','rut', 'phone', 'representative', 'email','statusclient'];

    public function proyect()
    {
        return $this->hasMany('App\Proyect');
    }

}
