<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\NguoiDung;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            NguoiDung::create([
                'ho_ten'      => "Người Dùng $i",
                'email'       => "user$i@example.com",
                'mat_khau'    => Hash::make('password123'),
                
                // vai_tro: admin hoặc sinh_vien
                'vai_tro'     => rand(0,1) ? 'admin' : 'sinh_vien',

                // trạng thái: hoat_dong hoặc khoa
                'trang_thai'  => rand(0,1) ? 'hoat_dong' : 'khoa',
            ]);
        }
    }
}
