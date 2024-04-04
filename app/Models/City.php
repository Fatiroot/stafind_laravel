<?php

namespace App\Models;

use App\Models\Offer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable=[
        'name'
    ];

    public function offers(){
        return $this->hasMany(Offer::class);
    }
}
