@extends('layouts.main')

@section('content')
<h3>Chi tiết Lớp học</h3>

<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <strong>Mã lớp:</strong>
            <div>{{ $item->ma_lop }}</div>
        </div>

        <div class="mb-3">
            <strong>Tên lớp:</strong>
            <div>{{ $item->ten_lop }}</div>
        </div>

        <div class="mb-3">
            <strong>Khoa:</strong>
            <div>{{ $item->khoa ?? '—' }}</div>
        </div>

        <div class="mb-3">
            <strong>Khoá học:</strong>
            <div>{{ $item->khoa_hoc ?? '—' }}</div>
        </div>

        <div class="mb-3">
            <strong>Giáo viên chủ nhiệm:</strong>
            <div>{{ $item->giao_vien_chu_nhiem ?? '—' }}</div>
        </div>

    </div>
</div>

<a href="{{ route('lop_hoc.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
@endsection
