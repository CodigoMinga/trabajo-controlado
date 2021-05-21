<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'name', 'entrytime', 'departuretime', 'startdate','finishdate','contact','statusproyect','client_id',
'user_id'];
}
