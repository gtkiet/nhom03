@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Danh sách Lớp học</h3>

        @if(auth()->check() && auth()->user()->vai_tro === 'admin')
            <a href="{{ route('lop_hoc.create') }}" class="btn btn-primary">Thêm mới</a>
        @endif
    </div>


    <form action="{{ route('lop_hoc.index') }}" method="GET" class="mb-3 d-flex" style="max-width: 400px;">
        <input type="text" name="keyword" class="form-control" placeholder="Tìm theo mã lớp hoặc tên lớp..."
            value="{{ request('keyword') }}">
        <button class="btn btn-secondary ms-2">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Mã lớp</th>
                <th>Tên lớp</th>
                <th>Khoa</th>
                <th>Khóa học</th>
                <th>GVCN</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lopHoc as $lh)
                <tr>
                    <td>{{ $lh->id }}</td>
                    <td>{{ $lh->ma_lop }}</td>
                    <td>{{ $lh->ten_lop }}</td>
                    <td>{{ $lh->khoa }}</td>
                    <td>{{ $lh->khoa_hoc }}</td>
                    <td>{{ $lh->giao_vien_chu_nhiem }}</td>
                    <td width="180">
                        <a href="{{ route('lop_hoc.show', $lh->id) }}" class="btn btn-info btn-sm">
                            Xem
                        </a>
                        @if(auth()->check() && auth()->user()->vai_tro === 'admin')
                            <a href="{{ route('lop_hoc.edit', $lh->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                            <form action="{{ route('lop_hoc.destroy', $lh->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Xóa lớp học?')" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div style="margin-top:12px">
        {{ $lopHoc->links('components.pagination') }}
    </div>
@endsection