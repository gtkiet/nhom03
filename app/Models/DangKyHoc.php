<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DangKyHoc extends Model
{
    protected $table = 'dang_ky_hoc';

    protected $fillable = [
        'id_sinh_vien',
        'id_lop_mon_hoc',
        'ngay_dang_ky',
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
