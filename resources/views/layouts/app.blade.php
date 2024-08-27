<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project List - Admin')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @stack('styles')

    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            display: flex;
            height: 100%;
            padding-left: 0;
        }

        .sidebar {
            width: 250px;
            background-color: #E8BE28;
            height: 100%;
            transition: all 0.3s ease;
            padding: 20px;
            box-sizing: border-box;
            position: fixed;
            top: 0;
            bottom: 0;
            overflow: hidden; /* Prevent scrollbars */
        }

        .sidebar-collapsed {
            width: 60px;
            padding: 20px 10px;
            overflow: hidden;
        }

        .sidebar-content {
            display: block;
        }

        .sidebar-collapsed .sidebar-content {
            display: none;
        }

        .main-content {
            margin-left: 250px;
            flex-grow: 1;
            transition: margin-left 0.3s ease;
            padding: 20px;
        }

        .main-content-expanded {
            margin-left: 60px;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            margin-left: 0;
        }

        /* Styles for the sidebar toggle button */
        #toggleSidebar {
            background: none;
            border: none;
            color: #000;
            font-size: 24px;
            padding: 10px; /* Add padding around the icon */
            text-align: left;
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 4px; /* Optional: add rounded corners to the button */
        }

        /* Ensure that the sidebar content and toggle button do not overlap */
        .sidebar {
            padding-top: 60px; /* Make space for the toggle button */
        }

        .nav-link {
            position: relative;
            display: flex;
            align-items: center;
            padding: 10px 15px;
            color: black;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .nav-link:hover {
            background-color: black;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.8);
        }

        .nav-item:not(:last-child) {
            border-bottom: 1px solid #ddd;
        }

        /* Styles for the collapsed state */
        .sidebar-collapsed #toggleSidebar {
            position: relative;
        }

        .sidebar-collapsed .nav-link {
            justify-content: center;
        }

        .sidebar-collapsed .nav-link span {
            display: none;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <a href="/" class="navbar-brand">
                    <img src="{{ asset('images/logo.png') }}" alt="RESINDO Logo" style="height: 40px;">
                </a>
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a class="nav-link text-white" href="{{ route('project.index') }}">Projects</a></li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endauth
                        @guest
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('login') }}">Login</a></li>
                            <li class="nav-item"><a class="nav-link text-white" href="{{ route('register') }}">Register</a></li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Container -->
    <div class="container-fluid">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar sidebar-collapsed">
            <button id="toggleSidebar"><i class="fas fa-bars"></i></button>
            <div class="sidebar-content">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('project.index') }}">
                            📁 Project List
                        </a>
                    </li>
                    <!-- Add more nav-items as needed -->
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main id="main-content" class="main-content">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Breadcrumb -->
            @yield('breadcrumbs')

            <!-- Page Content -->
            <div class="my-4">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Footer -->
    <!-- <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; {{ date('Y') }} adinda. All rights reserved.</p>
        </div>
    </footer> -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');
            
            sidebar.classList.add('sidebar-collapsed');
            mainContent.classList.add('main-content-expanded');
            
            document.getElementById('toggleSidebar').addEventListener('click', function() {
                sidebar.classList.toggle('sidebar-collapsed');
                mainContent.classList.toggle('main-content-expanded');
            });
        });
    </script>
    @stack('scripts')
</body>

</html>
