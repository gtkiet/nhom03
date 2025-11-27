<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class NguoiDungSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name'      => "Người Dùng $i",
                'email'       => "user$i@example.com",
                'password'    => Hash::make('password123'),
                
                // vai_tro: admin hoặc sinh_vien
                'vai_tro'     => rand(0,1) ? 'admin' : 'sinh_vien',
            ]);
        }
    }
}
