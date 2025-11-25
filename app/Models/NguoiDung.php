<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguoiDung extends Model
{
    protected $table = 'nguoi_dung';

    protected $fillable = [
        'ho_ten',
        'email',
        'mat_khau',
        'vai_tro',
        'trang_thai',
    ];

    // 1 user -> 1 sinh viên (nếu vai trò là sinh viên)
    public function sinhVien()
    {
        return $this->hasOne(SinhVien::class, 'id_nguoi_dung');
    }
}
