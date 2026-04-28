@extends('template.main')
@section('title', 'Home')
@section('content')
    <header class="header">
        <div class="search-bar">
            <form action="{{ route('home') }}" method="get">
                @csrf
                <input type="text" placeholder="Cari data" name="search" value="{{ request('search') }}">
            </form>
        </div>

        <head class="header-action">
            <a href="{{ route('content.create') }}" class="btn-create">Create New</a>
            <div>{{ auth()->user()->name }}</div>
        </head>
    </header>

    <div class="" style="margin-block: 30px">
        <a href="{{ route('home') }}" class="btn-primary">All</a>
        @foreach ($genre as $index)
            <a href="{{ route('home', 'genre=' . $index->id) }}" class="btn-primary">{{ $index->genre_title }}</a>
        @endforeach
    </div>
    <div class="feature-cards">
        @if (request()->query('search'))
            <p>Hasil pencarian '<strong>{{ request()->query('search') }}</strong>' {{ count($content) }} hasil <a
                    href="{{ route('home') }}">Reset</a></p>
        @endif

        @forelse ($content  as $item)
            <div class="feature-card" onclick="window.location.href='{{ route('content.show', $item->id) }}'">
                <img src="{{ asset('uploads/cover/' . $item->cover) }}" alt="{{ $item->title }}"
                    style="object-fit: cover; aspect-ratio: 9/10; ; width: 100%">
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->genre->genre_title }} | {{ $item->duration }} Minutes</p>
            </div>
        @empty
            <p>Content tidak ada lagi</p>
        @endforelse
    </div>
@endsection
