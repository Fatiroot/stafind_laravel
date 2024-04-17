<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes,InteractsWithMedia;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'fullname',
    'email',
    'password',
    'address',
    'phone',
    'status',
    'company_id',
    'created_at',
    'updated_at',
    'deleted_at',
];
     public function roles()
     {
        return $this->belongsToMany(Role::class);
     }
     public function hasRole($roleName)
     {
         return $this->roles->contains('name', $roleName);
     }

      public function company()
     {
        return $this->belongsTo(Company::class);
      }

      public function formations()
      {
          return $this->belongsToMany(Formation::class, 'formation-user');
      }
      public function experiences()
      {
          return $this->hasMany(Experience::class);
      }


      public function Skills()
     {
        return $this->belongsToMany(Skill::class,'skill-users');
      }
      public function representaiveOffers()
      {
          return $this->hasMany(Offer::class);
      }


    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'offer_users');
    }

    public function offer()
    {
        return $this->belongsToMany(OfferUser::class, 'offer_users');
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
