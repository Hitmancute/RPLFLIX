@extends('template.main')
@section('title', 'User')
@section('content')
    <header class="header">
        <div class="search-bar">
            <form action="{{ route('admin.user.index') }}" method="get">
                @csrf
                <input type="text" placeholder="Cari data" name="search">
            </form>
        </div>

        <head class="header-action">
            <a href="{{ route('register') }}" class="btn-create">Create New</a>
            <div>{{ auth()->user()->name }}</div>
        </head>
    </header>
    <h1>Index | User {{ count($user) !== 'admin' }}</h1> <br>
    <div class="feature-cards-flex">
        @forelse ($user  as $item)
            @if ($item->role !== 'admin')
                <div class="feature-card-flex" onclick="window.location.href='{{ route('admin.user.show', $item->id) }}'">
                    <h1>👤</h1>
                    <div style="">
                        <h3>{{ $item->name }}</h3>
                        <p>{{ $item->email }} | {{ $item->role }}</p>
                    </div>
                    <div style="display: block; margin-left: auto;">
                        <form action="" method="post" onsubmit="return confrim('are you sure?')"
                            style="flex-direction: row">
                            @csrf
                            <a class="btn-create" href="{{ route('register') }}">Edit</a>
                            <button class="btn-create btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @endif
        @empty
            <p>Content tidak ada lagi</p>
        @endforelse
    </div>
@endsection
