<?php

namespace App\Models;

use App\Models\User;
use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'rooms',
        'bathrooms',
        'area',
        'price',
    ];

    public function favoritedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
