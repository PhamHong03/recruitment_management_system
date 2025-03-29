<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $fillable = [
        'branch_name',
        'branch_position',
        'slug',
        'active'
    ];


    // Quan hệ với OpenPosition
    public function openPositions()
    {
        return $this->hasMany(OpenPosition::class, 'branch_id', 'id');
    }
}
