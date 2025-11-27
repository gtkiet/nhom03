@extends('layouts.main')

@section('content')
<h3>Sửa Người dùng</h3>

<form method="POST" action="{{ route('user.update', $User->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Họ tên:</label>
        <input type="text" name="name"
               value="{{ $User->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email:</label>
        <input type="email" name="email"
               value="{{ $User->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Mật khẩu (để trống nếu không đổi):</label>
        <input type="password" name="password" class="form-control">
    </div>

    <div class="mb-3">
        <label>Vai trò:</label>
        <select name="vai_tro" class="form-control">
            <option value="admin" {{ $User->vai_tro=='admin'?'selected':'' }}>Admin</option>
            <option value="sinh_vien" {{ $User->vai_tro=='sinh_vien'?'selected':'' }}>Sinh viên</option>
        </select>
    </div>
    
    <button class="btn btn-primary">Cập nhật</button>
</form>
@endsection
