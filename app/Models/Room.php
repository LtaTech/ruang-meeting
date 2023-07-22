<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'branch_id',
        'name',
        'description',
        'facilities',
        'is_published',
    ];

    protected $casts = [
        'facilities' => 'array',
        'is_published' => 'boolean',
    ];

    public function branch() : BelongsTo {
        return $this->belongsTo(Branch::class, 'branch_id', 'id');
    }

    public function images() : HasMany {
        return $this->hasMany(RoomImages::class, 'room_id', 'id');
    }

    public function book(): HasMany {
        return $this->hasMany(Booking::class, 'room_id', 'id');
    }
}
