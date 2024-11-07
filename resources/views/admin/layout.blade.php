<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- Bootstrap 5.2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding: 20px;
        }
        .sidebar a {
            color: #ffffff;
            margin: 10px 0;
            text-decoration: none;
            display: block;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar ">
        <h4 class="text-white">Admin Sách Truyện</h4>
        <a href="{{route('admin.users.home')}}">Dashboard</a>
        <a href="{{route('admin.users.index')}}">Users</a>
        <a href="{{route('admin.danhmuc.index')}}">Danh mục truyện</a>
        <a href="{{route('admin.truyen.index')}}">Truyện</a>

       
        <a href="{{route('login')}}"> {{Auth::user()->username}} Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
       

       @yield('content')
    </div>
    <!-- Bootstrap 5.2 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
