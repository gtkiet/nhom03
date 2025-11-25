<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mon_hoc', function (Blueprint $table) {
            $table->id();
            $table->string('ma_mon', 20)->unique();
            $table->string('ten_mon', 100);
            $table->integer('so_tin_chi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mon_hoc');
    }
};
