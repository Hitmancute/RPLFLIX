@extends('template.main')
@section('title', 'content')
@section('content')
    <img src="{{ asset('uploads/cover/' . $content->cover) }}" alt="{{ $content->title }}"
        style="object-fit: cover; aspect-ratio: 9/16; ; width: 100px">
    <h1>{{ $content->title }}</h1>
    <video width="640" height="360" autoplay muted loop controls>
        <source src="{{ asset('uploads/film/' . $content->file) }}">
    </video>
    <p>
        {{ $content->description }}
    </p> <br><br>
    <form action="{{ route('content.destroy', $content->id) }}" method="post" onsubmit="return confrim('are you sure?')">
        @csrf
        <button><a href="{{ route('content.edit', $content->id) }}">Edit</a></button>
        @METHOD('DELETE')
        <button type="submit">Delete</button>
    </form>
@endsection
