<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Traits\generateUuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, generateUuid, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'address',
        'phone_number',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function bids(): HasMany
    {
        return $this->hasMany(Bid::class);

    }

    public function userFullName(){
        return $this->first_name.' '.($this->middle_name ?? '').' '.$this->last_name;
    }

    public function isUserAdmin(){
        return $this->role == 'admin';
    }

    public function isUserBuyer(){
        return $this->role != 'seller';
    }
    public function isUserSeller(){
        return $this->role != 'buyer';
    }
}
