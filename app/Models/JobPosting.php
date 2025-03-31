<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPosting extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_posting_name',
        'job_posting_description',
        'job_posting_request',
        'job_posting_content',
        'job_posting_salary',
        'job_posting_start_date',
        'job_posting_end_date',
        'job_posting_status',
        'job_posting_poster',
        'active'
    ];


    public function openPositions()
    {
        return $this->belongsToMany(OpenPosition::class, 'posting_positions', 'job_posting_id', 'open_position_id');
    }

}
