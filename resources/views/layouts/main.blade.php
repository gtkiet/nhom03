<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Quản lý sinh viên')</title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">Student Manager</a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          @if(auth()->check() && auth()->user()->vai_tro === 'admin')
            <li class="nav-item"><a class="nav-link" href="{{ route('user.index') }}">Người dùng</a></li>
          @endif
          <li class="nav-item"><a class="nav-link" href="#">Sinh viên</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('lop_hoc.index') }}">Lớp học</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Môn học</a></li>
          @auth
            <li class="nav-item">
              <a class="nav-link text-warning" href="#">{{ Auth::user()->name ?? 'User' }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-danger" href="/logout">Đăng xuất</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link text-info" href="/login">Đăng nhập</a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>

  <div class="container mt-4">
    @yield('content')
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>