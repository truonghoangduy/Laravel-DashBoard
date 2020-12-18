<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    const ADMIN = "admin";
    const EDITOR = 'editor';
    const CUSTOMER = 'customer';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',"role_id"
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
    public function role() {
        return $this->belongsTo('App\Models\Role');
    }

    public function profile(){
        return $this->hasOne('App\Models\Profile');
    }


    public function cart(){
        return $this->hasMany('App\Models\Cart','user_id');
    }

    public function hasRole($role){
//        dd($this->role()->get('name')->first()->name );
//        dd($this->role()->get('name') == $role);
        return strcmp($role, $this->role->name)==0;
    }


}
