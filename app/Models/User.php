<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'skills',
        'phone',
        'address',
        'description',
        'status',
    ];
    public const STATUS_LABELS = [
        '1'=> 'Pending',
        '2'=> 'Accepted',
        '3'=> 'Banned',
    ];

    public function getStatus(){
        return self::STATUS_LABELS[$this->status];
    }


    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function offers()
    {
        return $this->belongsToMany(Offer::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }
    
    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


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
    ];
}
