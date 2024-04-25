<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferUser extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable=[
        "user_id",
        "status",
        "offer_id",
        "description",
        "created_at",
        "updated_at",
        "deleted_at",
    ];
    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function user()
{
    return $this->belongsTo(User::class);
}


}
