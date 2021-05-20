<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'activitydescription', 'entrytimetask', 'percentage', 'statustask','item_id'];
}
