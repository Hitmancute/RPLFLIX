@extends('template.main')
@section('title', 'genre')
@section('content')
    <header class="header">
        <div class="search-bar">
            <form action="{{ route('admin.genre.index') }}" method="get">
                @csrf
                <input type="text" placeholder="Cari data" name="search">
            </form>
        </div>

        <head class="header-action">
            <a href="{{ route('admin.genre.create') }}" class="btn-create">Create New</a>
            <div>{{ auth()->user()->name }}</div>
        </head>
    </header>

    <div class="feature-cards-flex">
        @if (request()->query('search'))
            <p>Hasil pencarian '<strong>{{ request()->query('search') }}</strong>' {{ count($genre) }} hasil <a href="{{ route('admin.genre.index') }}">Reset</a></p>
        @endif

        @foreach ($genre as $data)
        <div class="feature-card-flex">
            <h1 style="margin-right: 20px">🎞️</h1>
            <div style="">
                <h3>{{ $data->genre_title }}</h3>
                <p>{{ $data->desription }}</p>
            </div>
            <div style="display: block; margin-left: auto;">
                <form action="{{ route('admin.genre.destroy', $data->id) }}" method="post"
                    onsubmit="return confrim('are you sure?')" style="flex-direction: row">
                    @csrf
                    <a class="btn-create" href="{{ route('admin.genre.edit', $data->id) }}">Edit</a>
                    @method('DELETED')
                    <button class="btn-create btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
@endsection
