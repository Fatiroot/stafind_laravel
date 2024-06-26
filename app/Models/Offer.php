<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Offer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=[
        'title',
        'description',
        'duration',
        'salary',
        'localisation',
        'company_id',
        'status',
        'user_id',
        'city_id',
        'domain_id',
    ];
    public function user(){
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
        return $this->belongsToMany(User::class, 'offer_users');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }



}
