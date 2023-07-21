<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';
    protected $fillable = [
        'code',
        'name'
    ];
    
    public function room() : HasMany {
        return $this->hasMany(Room::class, 'branch_id', 'id');
    }
}
