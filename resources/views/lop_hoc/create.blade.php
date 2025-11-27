@extends('layouts.main')

@section('content')
    <h3>Thêm Lớp học</h3>

    <form method="POST" action="{{ route('lop_hoc.store') }}">
        @csrf

        <div class="mb-3">
            <label>Mã lớp:</label>
            <input type="text" name="ma_lop" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tên lớp:</label>
            <input type="text" name="ten_lop" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Khoa:</label>
            <input type="text" name="khoa" class="form-control">
        </div>

        <div class="mb-3">
            <label>Khoá học:</label>
            <input type="text" name="khoa_hoc" class="form-control">
        </div>

        <div class="mb-3">
            <label>Giáo viên chủ nhiệm:</label>
            <input type="text" name="giao_vien_chu_nhiem" class="form-control">
        </div>

        <button class="btn btn-success">Lưu</button>
    </form>
@endsection