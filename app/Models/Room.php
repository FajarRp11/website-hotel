<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'room_number',
        'room_type',
        'description',
        'image',
        'price_per_night',
        'room_status'
    ];

    protected $with = ['facilities'];
    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'room_facilities', 'room_id', 'facility_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
