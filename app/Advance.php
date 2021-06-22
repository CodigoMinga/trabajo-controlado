<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    protected $fillable = ['name','up_date','people','workedh','percentage','coment','image','task_id','created_at', 'updated_at','enabled'];

    public function task(){
        return $this->belongsTo(Task::class);
    }
}
