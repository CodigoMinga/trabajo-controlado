<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'description', 'hhscheduled', 'hhreal', 'entrytime_item'];
}
