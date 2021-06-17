<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    protected $fillable = ['created_at', 'updated_at', 'name', 'entrytime', 'departuretime', 'startdate','finishdate','contact','statusproyect','client_id',
'user_id','enabled'];


    public function workers(){
        return $this->belongsToMany(User::class);
        
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(Client::class);
    }
    public function items(){
        return $this->HasMany(Item::class);
    }
    public function assignproyect(){
        return $this->belongsTo('App\User','assignproyect_id','id');
    }
}
