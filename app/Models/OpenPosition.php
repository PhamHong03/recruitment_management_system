<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'open_position_name',
        'open_position_description',
        'open_position_requirements',
        'branch_id',
        'hiring_round_id',
        'active'
    ];

    // Quan hệ với Branch
    public function branch()
    {
        return $this->hasOne(Branch::class, 'id', 'branch_id')
        ->withDefault(['branch_name' => '']);
    }

    // Quan hệ với HiringRound (nếu cần thiết)
    public function hiringRound()
    {
        return $this->hasOne(HiringRound::class, 'id', 'hiring_round_id')
        ->withDefault(['hiring_round_name' => '']);
    }

    public function jobPostings()
    {
        return $this->belongsToMany(JobPosting::class, 'posting_positions', 'open_position_id', 'job_posting_id');
    }

}
