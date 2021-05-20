<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','rut','phone','enable',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function clientUsers()
    {
        return $this->hasMany('App\ClientUser');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userRoles()
    {
        return $this->hasMany('App\UserRole');
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }


    public function hasRole($role)
    {
        //verifica que sea un array, si es un array hace una busqueda del array
        if (is_array($role)) {
            return null !== $this->roles()->whereIn('name', $role)->first();
        }else{
            return null !== $this->roles()->where('name', $role)->first();
        }
    }
}
