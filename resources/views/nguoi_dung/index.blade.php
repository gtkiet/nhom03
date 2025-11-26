@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Danh sách Người dùng</h3>
        <a href="{{ route('nguoi_dung.create') }}" class="btn btn-primary">Thêm mới</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th>Trạng thái</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nguoiDung as $nd)
                <tr>
                    <td>{{ $nd->id }}</td>
                    <td>{{ $nd->ho_ten }}</td>
                    <td>{{ $nd->email }}</td>
                    <td>{{ $nd->vai_tro }}</td>
                    <td>{{ $nd->trang_thai }}</td>
                    <td>
                        <a href="{{ route('nguoi_dung.edit', $nd->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('nguoi_dung.destroy', $nd->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Xóa?')" class="btn btn-danger btn-sm">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection