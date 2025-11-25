public function up()
{
    Schema::create('dang_ky_hoc', function (Blueprint $table) {
        $table->id();

        $table->foreignId('id_sinh_vien')
              ->constrained('sinh_vien')
              ->cascadeOnDelete();

        $table->foreignId('id_lop_mon_hoc')
              ->constrained('lop_mon_hoc')
              ->cascadeOnDelete();

        $table->timestamp('ngay_dang_ky')->useCurrent();
        $table->enum('trang_thai', ['da_dang_ky', 'huy'])
              ->default('da_dang_ky');

        $table->string('ghi_chu', 255)->nullable();

        $table->unique(['id_sinh_vien', 'id_lop_mon_hoc']);

        $table->timestamps();
    });
}
