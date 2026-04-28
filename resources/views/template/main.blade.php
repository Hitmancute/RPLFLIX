<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>RPL Flix | @yield('title')</title>
</head>

<body>
    <div class="dashboard-container" id="DashboardContainer">
        <aside class="sidebar">
            <div class="sidebar-logo">
                <div class="logo-icon"></div>
                <span class="logo-text">RPL Flix</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="{{ route('home') }}"
                        class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
                <li class="nav-item"><a href="{{ route('content.index') }}"
                        class="nav-link {{ request()->routeIs('content.*') ? ' active' : '' }}">Content</a></li>
                @if (auth()->user()->role === 'admin')
                    <li class="nav-item"><a href="{{ route('admin.genre.index') }}"
                            class="nav-link {{ request()->routeIs('genre.*') ? 'active' : '' }}">Genre</a></li>
                    <li class="nav-item"><a href="{{ route('admin.user.index') }}"
                            class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}">User</a></li>
                @endif
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn-create btn-danger">Logout</button>
                    </form>
                </li>
            </ul>
        </aside>

        <main class="main-content">
            @yield('content')
        </main>
</body>

</html>
