<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostingPosition extends Model
{
    use HasFactory;
    protected $table = 'posting_positions';
    public $incrementing = false; // Vì dùng composite key
    protected $fillable = ['job_posting_id', 'open_position_id'];
}
