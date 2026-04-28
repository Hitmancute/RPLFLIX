@extends('template.main')
@section('title','genre')
@section('content')
<header class="header">
                <head class="header-action">
                    <a href="{{ route('genre.index') }}" class="btn-create">Back</a>
                    <div>Crate New</div>   
                </head>
    </header>
<form action="{{ route('genre.store') }}" method="post">
    @csrf
    <label for="genre_title">Genre title:</label>
    <input type="text" name="genre_title" id="genre_title" value="{{ old('genre_title') }}">
    @error('genre_title')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>
    
    <label for="desription">Title Genre:</label>
    <textarea name="desription" id="desription" cols="30" rows="10">
        {{ old('desription') }}
    </textarea>
    @error('desription')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>
    <button type="submit">Save</button>
</form>
@endsection
