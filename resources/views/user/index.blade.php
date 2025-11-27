@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Danh sách Người dùng</h3>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Thêm mới</a>
    </div>
    <form action="{{ route('user.index') }}" method="GET" class="mb-3 d-flex" style="max-width: 400px;">
        <input type="text" name="keyword" class="form-control" placeholder="Tìm theo tên hoặc email..."
            value="{{ request('keyword') }}">
        <button class="btn btn-secondary ms-2">Search</button>
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Vai trò</th>
                <th width="150">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($User as $nd)
                <tr>
                    <td>{{ $nd->id }}</td>
                    <td>{{ $nd->name }}</td>
                    <td>{{ $nd->email }}</td>
                    <td>{{ $nd->vai_tro }}</td>
                    <td>
                        <a href="{{ route('user.edit', $nd->id) }}" class="btn btn-warning btn-sm">Sửa</a>

                        <form action="{{ route('user.destroy', $nd->id) }}" method="POST" style="display:inline">
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
    <div style="margin-top:12px">
        {{ $User->links('components.pagination') }}
    </div>
@endsection