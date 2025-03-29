<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HiringRound extends Model
{
    use HasFactory;
    protected $table = 'hiring_rounds'; // Tên bảng trong database

    protected $fillable = [
        'hiring_round_name',
        'start_date',
        'end_date',
        'status',
        'description',
        'active'
    ]; // Các cột có thể gán giá trị hàng loạt

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ]; // Ép kiểu ngày tháng
    
    public function getStatusTextAttribute()
    {
        return match ($this->status) {
            'pending'   => 'Chờ mở',
            'ongoing'   => 'Đang diễn ra',
            'completed' => 'Hoàn thành',
            'canceled'  => 'Đã hủy',
            default     => 'Không xác định',
        };
    }
    /**
     * Scope lọc vòng tuyển dụng theo trạng thái.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }


    // Quan hệ với OpenPosition
    public function openPositions()
    {
        return $this->hasMany(OpenPosition::class, 'hiring_round_id', 'id');
    }
}
