<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Company extends Model implements HasMedia
{
    use HasFactory ,SoftDeletes , InteractsWithMedia;

    protected $fillable =[
            'name',
            'location',
            'description'
        ];
        public function users()
        {
            return $this->hasMany(User::class);
        }


        public function offres()
        {
            return $this->hasMany(Offer::class);
        }

        public function sectors()
        {
            return $this->belongsToMany(Sector::class, 'company_sector');
        }
}
