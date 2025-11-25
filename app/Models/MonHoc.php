<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonHoc extends Model
{
    protected $table = 'mon_hoc';

    protected $fillable = [
        'ma_mon',
        'ten_mon',
        'so_tin_chi',
        'mo_ta',
    ];

    // 1 môn có nhiều lớp học phần
    public function lopMonHoc()
    {
        return $this->hasMany(LopMonHoc::class, 'id_mon_hoc');
    }
}
