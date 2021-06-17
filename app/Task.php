<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['created_at', 'updated_at','title', 'description', 'entrytime', 'percentage', 'status','item_id'];

    public function item(){
        return $this->belongsTo(Item::class);
    }
    public function advance()
    {
        return $this->hasMany('App\Advance');
    }
    public function item(){
        return $this->belongsTo(item::class);
    }
}
