<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    
    use SoftDeletes;

    // use HasRoles;

    use HasFactory, Notifiable, HasRoles;

    protected $guarded = [];

    function roles(){
        //return $this->belongsToMany('\App\Models\Role');

        return $this->belongsToMany(Role::class);
    }

    function posts(){
        //return $this->belongsToMany('\App\Models\Role');

        return $this->hasMany(Post::class);
    }

    function themes(){
        //return $this->belongsToMany('\App\Models\Role');

        return $this->hasMany(Theme::class);
    }

    // public function hasRole($role)
    // {
        
    //     if (is_string($role)) {
    //         return $this->roles->contains('name', $role);
    //     }

    //     return !! $role->intersect($this->roles)->count();
    // }








    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
