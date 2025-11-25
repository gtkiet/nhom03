<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('sinh_vien', function (Blueprint $table) {
            $table->id();
            $table->string('ma_sinh_vien', 20)->unique();
            $table->string('ho_ten', 100);
            $table->date('ngay_sinh')->nullable();
            $table->enum('gioi_tinh', ['Nam', 'Nữ', 'Khác'])->nullable();
            $table->string('email', 100)->nullable();
            $table->string('so_dien_thoai', 20)->nullable();
            $table->string('dia_chi', 255)->nullable();
            $table->string('anh_dai_dien', 255)->nullable();

            $table->foreignId('id_nguoi_dung')
                ->nullable()
                ->constrained('nguoi_dung')
                ->nullOnDelete();

            $table->foreignId('id_lop_hoc')
                ->nullable()
                ->constrained('lop_hoc')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sinh_vien');
    }
};
