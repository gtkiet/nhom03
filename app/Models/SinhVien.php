<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    protected $table = 'sinh_vien';

    protected $fillable = [
        'ma_sinh_vien',
        'ho_ten',
        'ngay_sinh',
        'gioi_tinh',
        'email',
        'so_dien_thoai',
        'dia_chi',
        'anh_dai_dien',
        'id_nguoi_dung',
        'id_lop_hoc',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'id_nguoi_dung');
    }

    public function lopHoc()
    {
        return $this->belongsTo(LopHoc::class, 'id_lop_hoc');
    }

    // Sinh viên có nhiều đăng ký học
    public function dangKyHoc()
    {
        return $this->hasMany(DangKyHoc::class, 'id_sinh_vien');
    }

    // Sinh viên có nhiều điểm danh
    public function diemDanh()
    {
        return $this->hasMany(DiemDanh::class, 'id_sinh_vien');
    }
}
