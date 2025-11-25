public function up()
{
    Schema::create('diem_danh', function (Blueprint $table) {
        $table->id();

        $table->foreignId('id_sinh_vien')
              ->constrained('sinh_vien')
              ->cascadeOnDelete();

        $table->foreignId('id_lop_mon_hoc')
              ->constrained('lop_mon_hoc')
              ->cascadeOnDelete();

        $table->date('ngay_hoc');
        $table->enum('trang_thai', ['co_mat', 'vang', 'di_tre']);
        $table->string('ghi_chu', 255)->nullable();

        $table->unique(['id_sinh_vien', 'id_lop_mon_hoc', 'ngay_hoc']);

        $table->timestamps();
    });
}
