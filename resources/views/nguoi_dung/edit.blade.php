@extends('layouts.main')

@section('content')
<h3>Sửa Người dùng</h3>

<form method="POST" action="{{ route('nguoi_dung.update', $nguoiDung->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Họ tên:</label>
        <input type="text" name="ho_ten"
               value="{{ $nguoiDung->ho_ten }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email"
               value="{{ $nguoiDung->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Mật khẩu (để trống nếu không đổi):</label>
        <input type="password" name="mat_khau" class="form-control">
    </div>

    <div class="mb-3">
        <label>Vai trò:</label>
        <select name="vai_tro" class="form-control">
            <option value="admin" {{ $nguoiDung->vai_tro=='admin'?'selected':'' }}>Admin</option>
            <option value="sinh_vien" {{ $nguoiDung->vai_tro=='sinh_vien'?'selected':'' }}>Sinh viên</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Trạng thái:</label>
        <select name="trang_thai" class="form-control">
            <option value="hoat_dong" {{ $nguoiDung->trang_thai=='hoat_dong'?'selected':'' }}>Hoạt động</option>
            <option value="khoa" {{ $nguoiDung->trang_thai=='khoa'?'selected':'' }}>Khóa</option>
        </select>
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>
@endsection
