<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- CoreUI CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/css/coreui.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
            background: #f5f6f8;
            color: #343a40;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        .c-sidebar {
            width: 250px;
            background: linear-gradient(135deg, #007bff, #343a40);
            color: #fff;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: 1020;
            transition: left 0.3s ease, width 0.3s ease;
        }

        .c-sidebar .c-sidebar-brand {
            padding: 1rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ffffff;
            background-color: #007bff;
            border-bottom: 2px solid #fff;
        }

        .c-sidebar .c-sidebar-nav-item a {
            color: #fff;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .c-sidebar .c-sidebar-nav-item a:hover,
        .c-sidebar .c-sidebar-nav-link.active {
            background-color: #0056b3;
            color: #ffffff;
        }

        .c-sidebar .c-sidebar-nav-item a i {
            margin-right: 15px;
            font-size: 1.2rem;
        }

        .c-header {
            background: #007bff;
            color: white;
            padding: 1rem;
            z-index: 1030;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            padding-left: 250px;
            border-bottom: 2px solid #fff;
        }

        .c-header .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .c-header .c-header-title {
            font-size: 1.8rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .c-header .user-info {
            font-size: 1.2rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .c-header .user-info span {
            font-weight: bold;
            color: #ffffff;
        }

        .c-header .user-info .bi-person-circle {
            font-size: 1.5rem;
            margin-right: 10px;
        }

        .c-content {
            margin-left: 250px;
            padding: 2rem;
            width: 100%;
            padding-top: 80px;
        }

        .dashboard-header {
            background: linear-gradient(135deg, #f8f9fa, #ffffff);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
            transition: all 0.3s ease;
        }

        .dashboard-header .user-info {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .dashboard-header .user-info span {
            font-weight: bold;
            color: #007bff;
        }

        /* Hover effect on Sidebar */
        .c-sidebar:hover {
            width: 270px;
        }

        /* Subtle slide-in effect for page content */
        .c-content {
            animation: slideIn 0.5s ease-out;
        }

        /* Keyframes for slide-in animation */
        @keyframes slideIn {
            0% {
                transform: translateX(30px);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        /* Custom Logout Button Styling */
        .logout-btn {
            background-color: #dc3545;
            color: white;
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            display: flex;
            align-items: center;
            padding: 0.75rem 1rem;
            margin-top: 20px;
            width: 100%;
            text-align: left;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .logout-btn:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .logout-btn i {
            margin-right: 10px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="c-sidebar" id="sidebar">
            <div class="c-sidebar-brand">
                Inventaris Management Barang
            </div>
            <ul class="c-sidebar-nav-items list-unstyled">

                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('user/pengadaan') || request()->is('user/pengadaan/*') ? 'active' : '' }}"
                        href="{{ route('user.pengadaan.index') }}">
                        <i class="bi bi-cart"></i> Pengadaan
                    </a>
                </li>

                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('admin/opname') || request()->is('user/opname/*') ? 'active' : '' }}"
                        href="{{ route('user.opname.index') }}">
                        <i class="bi bi-journal"></i> Opname
                    </a>
                </li>
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('user/hitung_depresiasi') || request()->is('user/hitung_depresiasi/*') ? 'active' : '' }}"
                        href="{{ route('user.hitung_depresiasi.index') }}">
                        <i class="bi bi-calculator"></i> Hitung Depresiasi
                    </a>
                </li>
                <!-- Logout Button -->
                <li class="c-sidebar-nav-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="c-content" id="content">
            <!-- Dashboard Header -->
            <div class="dashboard-header">
                <div class="container">
                    <h1 class="c-header-title">Dashboard</h1>
                    <div class="user-info d-flex align-items-center">
                        <span class="bi bi-person-circle me-2"></span>
                        <span>Hi, {{ auth()->user()->name }}</span> <!-- Sapaan "Hi, Admin" -->
                    </div>
                </div>
            </div>

            <!-- Main content -->
            <div class="p-3">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- CoreUI dan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.0.0/dist/js/coreui.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
