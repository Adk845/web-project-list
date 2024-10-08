<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Project List - Admin')</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @stack('styles')


</head>

<body>
    <!-- Header -->
    <header class="bg-dark text-white p-3">
        <div class="container-fluid">
            {{-- <div class="d-flex justify-content-between align-items-center"> --}}
            <div class="container_navbar">
                <div class="navbar_brand_div">
                    <a href="/" class="navbar-brand">
                        <img src="{{ asset('images/logo.png') }}" alt="RESINDO Logo" style="height: 75px;">
                    </a>
                </div>
                <div class="navbar_div">
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
                            @endguest
                        </ul>
                    </nav>
                </div>
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
    {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/index.js') }}"></script>
    @stack('script')
</body>

</html>