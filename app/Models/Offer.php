<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $fillable=[
        'title',
        'salary',
        'duration',
        'period',
        'experience',
        'description',
        'status',
        'user_id',
        'city_id',
        'domain_id'
    ];

    public const STATUS=[
        1 => 'pending',
        2 => 'sent',
    ];

    public function agent(){
       return $this->belongsTo(User::class);
    }

    public function domain(){
        return $this->belongsTo(Domain::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
}
