<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formation extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "start_date",
        "end_date",
        "etablissement",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    public function users()
    {
        return $this->belongsToMany(User::class, 'formation-user');
    }
}
