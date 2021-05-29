<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['created_at', 'updated_at','title', 'description', 'entrytime', 'percentage', 'status','item_id'];
}
