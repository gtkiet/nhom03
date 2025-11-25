<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    protected $table = 'diem_danh';

    protected $fillable = [
        'id_sinh_vien',
        'id_lop_mon_hoc',
        'ngay_hoc',
        'trang_thai',
        'ghi_chu',
    ];

    public function sinhVien()
    {
        return $this->belongsTo(SinhVien::class, 'id_sinh_vien');
    }

    public function lopMonHoc()
    {
        return $this->belongsTo(LopMonHoc::class, 'id_lop_mon_hoc');
    }
}
