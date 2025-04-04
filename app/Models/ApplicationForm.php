<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationForm extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'email',
        'job_position_id',
        'pdf_file_path',
        'submitted_at',
        'status'
    ];

    // public function openPosition()
    // {
    //     return $this->hasOne(OpenPosition::class, 'id', 'job_position_id')
    //     ->withDefault(['open_position_name' => '']);
    // }

    // ApplicationForm Model
    public function openPosition()
    {
        return $this->belongsTo(OpenPosition::class, 'job_position_id');
    }


    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->pdf_file_path);
    }
}
