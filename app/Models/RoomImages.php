<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomImages extends Model
{
    use HasFactory;
    
    protected $table = 'room_images';

    protected $fillable = [
        'room_id',
        'image',
        'is_default',
        'is_published',
    ];

    protected $casts = [
        'is_default' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function room() : BelongsTo {
        return $this->belongsTo(Room::class, 'room_id', 'id');
    }
}
