<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LopHocSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('lop_hoc')->insert([
            [
                'ma_lop' => 'LH001',
                'ten_lop' => 'Lớp 10A1',
                'khoa' => 'Khoa Tự Nhiên',
                'khoa_hoc' => '2022 - 2025',
                'giao_vien_chu_nhiem' => 'Nguyễn Văn A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_lop' => 'LH002',
                'ten_lop' => 'Lớp 11B2',
                'khoa' => 'Khoa Xã Hội',
                'khoa_hoc' => '2021 - 2024',
                'giao_vien_chu_nhiem' => 'Trần Thị B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ma_lop' => 'LH003',
                'ten_lop' => 'Lớp 12C3',
                'khoa' => 'Khoa Công Nghệ',
                'khoa_hoc' => '2020 - 2023',
                'giao_vien_chu_nhiem' => 'Lê Văn C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
