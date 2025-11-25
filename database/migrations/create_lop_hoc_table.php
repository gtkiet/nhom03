<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('lop_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('ma_lop', 20)->unique();
            $table->string('ten_lop', 100);
            $table->string('khoa', 100)->nullable();
            $table->string('khoa_hoc', 50)->nullable();
            $table->string('giao_vien_chu_nhiem', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lop_hoc');
    }
};