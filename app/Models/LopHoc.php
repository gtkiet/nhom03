<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    protected $table = 'lop_hoc';

    protected $fillable = [
        'ma_lop',
        'ten_lop',
        'khoa',
        'khoa_hoc',
        'co_van_hoc_tap',
    ];

    // 1 lớp có nhiều sinh viên
    public function sinhVien()
    {
        return $this->hasMany(SinhVien::class, 'id_lop_hoc');
    }
}
