<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'description', 'hhscheduled', 'hhreal', 'entrytime_item','proyect_id','enabled'];

    public function proyect(){
        return $this->belongsTo(Proyect::class);
    }
    public function tasks(){
        return $this->HasMany(Task::class);
    }
}
