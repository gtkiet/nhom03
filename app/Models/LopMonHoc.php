<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LopMonHoc extends Model
{
    protected $table = 'lop_mon_hoc';

    protected $fillable = [
        'id_mon_hoc',
        'ten_lop_mon',
        'hoc_ky',
        'nam_hoc',
        'giang_vien',
        'lich_hoc',
        'phong_hoc',
        'ngay_bat_dau',
        'ngay_ket_thuc',
    ];

    public function monHoc()
    {
        return $this->belongsTo(MonHoc::class, 'id_mon_hoc');
    }

    // lớp học phần có nhiều đăng ký học
    public function dangKyHoc()
    {
        return $this->hasMany(DangKyHoc::class, 'id_lop_mon_hoc');
    }

    // lớp học phần có nhiều điểm danh
    public function diemDanh()
    {
        return $this->hasMany(DiemDanh::class, 'id_lop_mon_hoc');
    }
}
