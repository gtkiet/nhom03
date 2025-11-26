@extends('layouts.app')

@section('content')
    <h3>Sửa Lớp học</h3>

    <form method="POST" action="{{ route('lop_hoc.update', $item->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Mã lớp:</label>
            <input type="text" name="ma_lop" class="form-control" value="{{ old('ma_lop', $item->ma_lop) }}" required>
        </div>

        <div class="mb-3">
            <label>Tên lớp:</label>
            <input type="text" name="ten_lop" class="form-control" value="{{ old('ten_lop', $item->ten_lop) }}" required>
        </div>

        <div class="mb-3">
            <label>Khoa:</label>
            <input type="text" name="khoa" class="form-control" value="{{ old('khoa', $item->khoa) }}">
        </div>

        <div class="mb-3">
            <label>Khoá học:</label>
            <input type="text" name="khoa_hoc" class="form-control" value="{{ old('khoa_hoc', $item->khoa_hoc) }}">
        </div>

        <div class="mb-3">
            <label>Giáo viên chủ nhiệm:</label>
            <input type="text" name="giao_vien_chu_nhiem" class="form-control"
                value="{{ old('giao_vien_chu_nhiem', $item->giao_vien_chu_nhiem) }}">
        </div>

        <button class="btn btn-warning">Cập nhật</button>
        <a href="{{ route('lop_hoc.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection