@extends('layouts.main')

@section('content')
<h3>Thêm Người dùng</h3>

<form method="POST" action="{{ route('user.store') }}">
    @csrf

    <div class="mb-3">
        <label>Họ tên:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mật khẩu:</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Vai trò:</label>
        <select name="vai_tro" class="form-control">
            <option value="admin">Admin</option>
            <option value="sinh_vien">Sinh viên</option>
        </select>
    </div>

    <button class="btn btn-success">Lưu</button>
</form>
@endsection
