<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Experience extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        "name",
        "start_date",
        "end_date",
        "company_name",
        "description",
        "task",
        "user_id",
        "created_at",
        "updated_at",
        "deleted_at",

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
