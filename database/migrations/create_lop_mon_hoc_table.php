public function up()
{
    Schema::create('lop_mon_hoc', function (Blueprint $table) {
        $table->id();

        $table->foreignId('id_mon_hoc')
              ->constrained('mon_hoc')
              ->cascadeOnDelete();

        $table->string('ten_lop_mon', 100)->nullable();
        $table->string('hoc_ky', 20)->nullable();
        $table->string('nam_hoc', 20)->nullable();
        $table->string('giang_vien', 100)->nullable();
        $table->string('lich_hoc', 255)->nullable();
        $table->string('phong_hoc', 50)->nullable();

        $table->date('ngay_bat_dau')->nullable();
        $table->date('ngay_ket_thuc')->nullable();

        $table->timestamps();
    });
}
