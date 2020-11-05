<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UuidTrait;

class User extends Authenticatable
{
    use Notifiable, UuidTrait;

    protected function get_admin_id(){
        $role = Role::where('name', 'admin')->first();
        return $role->id;
    }

    protected function get_guest_id(){
        $role = Role::where('name', 'guest')->first();
        return $role->id;
    }

    public static function boot(){
        parent::boot();
        static::creating(function($model){
            $model->role_id = $model->get_guest_id();
        });
    }

    // FUNCTION CEK ADMIN ROLE
    public function isAdmin(){
        if($this->role_id == $this->get_admin_id()){
            return true;
        }
        return false;
    }

    // FUNCTION CEK VERIFIKASI EMAIL
    public function isVerified(){
        if($this->email_verified_at !== null){
            return true;
        }
        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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


}
