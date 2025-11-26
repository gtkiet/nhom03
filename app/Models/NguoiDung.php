<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class NguoiDung extends Authenticatable
{
    protected $table = 'nguoi_dung';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ho_ten',
        'email',
        'mat_khau',
        'vai_tro',
        'trang_thai',
    ];

    protected $hidden = [
        'mat_khau'
    ];

    // Chỉ định field mật khẩu
    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    // 1 user -> 1 sinh viên (nếu vai trò là sinh viên)
    public function sinhVien()
    {
        return $this->hasOne(SinhVien::class, 'id_nguoi_dung');
    }
}