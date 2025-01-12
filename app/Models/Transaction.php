<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_id',
        'room_id',
        'booking_number',
        'check_in_date',
        'check_out_date',
        'status',
        'total_cost',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->booking_number = self::generateBookingNumber();
        });

        static::saved(function ($transaction) {
            if ($transaction->status === 'success') {
                $room = Room::find($transaction->room_id);
                if ($room) {
                    $room->update(['room_status' => 'booked']);
                }
            }
        });
    }

    private static function generateBookingNumber()
    {
        $prefix = 'BK';
        $date = now()->format('Ymd');
        $random = strtoupper(substr(uniqid(), -4));
        
        $number = $prefix . $date . $random;
        
        // Check if number exists
        while (self::where('booking_number', $number)->exists()) {
            $random = strtoupper(substr(uniqid(), -4));
            $number = $prefix . $date . $random;
        }
        
        return $number;
    }
}
