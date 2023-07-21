<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $fillable = [
        'event_name',
        'room_id',
        'check_in',
        'check_out',
        'guest_name',
        'guest_email',
    ];  

    protected $casts  = [
        'check_in' => 'datetime',
        'check_out' => 'datetime',
    ];

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
