<div>
    <h1>Dashboard Admin</h1>
    <p>selamat datang {{ Auth::user()->name }} role anda adalah {{ Auth::user()->role }}</p>
    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>

    <header class="header">
                <div class="search-bar">
                    <input type="text" placeholder="Cari data">
                </div>

                <head class="header-action">
                    <a href="#" class="btn-create">Create New</a>
                    <div>Dafa Putra</div>   
                </head>
            </header>

            <div class="feature-cards">
                <div class="feature-card">
                    <div class="feature-icon">%</div>
                        <h3>move</h3>
                </div>
            </div>
</div>
