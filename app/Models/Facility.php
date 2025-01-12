<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'image',
        'name',
        'description',
    ];

    public function rooms(): BelongsToMany
    {
        return $this->belongsToMany(Room::class, 'room_facilities', 'facility_id', 'room_id');
    }
}
