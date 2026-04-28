@extends('template.main')
@section('title', 'content')
@section('content')
    <header class="header">
        <div class="search-bar">
            <form action="{{ route('content.index') }}" method="get">
                @csrf
                <input type="text" placeholder="Cari data" name="search">
            </form>
        </div>

        <head class="header-action">
            <a href="{{ route('content.create') }}" class="btn-create">Create New</a>
            <div>{{ auth()->user()->name }}</div>
        </head>
    </header>
    <h1>Index | Content</h1> <br>
    <div class="feature-cards">
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
