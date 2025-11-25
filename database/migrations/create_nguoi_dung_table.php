public function up()
{
    Schema::create('nguoi_dung', function (Blueprint $table) {
        $table->id();
        $table->string('ho_ten', 100);
        $table->string('email', 100)->unique();
        $table->string('mat_khau', 255);
        $table->enum('vai_tro', ['admin', 'sinh_vien'])->default('sinh_vien');
        $table->enum('trang_thai', ['hoat_dong', 'khoa'])->default('hoat_dong');
        $table->timestamps();
    });
}
