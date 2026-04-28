@extends('template.main')
@section('title','content')
@section('content')
<header class="header">
                <head class="header-action">
                    <a href="{{ route('content.index') }}" class="btn-create">Back</a>
                    <div>Crate New</div>   
                </head>
    </header>
<form action="{{ route('content.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="{{ old('title') }}">
    @error('title')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="genre_id">Genre:</label>
    <select name="genre_id" id="genre_id">
        @foreach($genre as $data)
        <option value="{{ $data->id }}">{{ $data->genre_title }}</option>
        @endforeach
    </select>
    @error('genre')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="description">Description:</label>
    <textarea name="description" id="description" cols="30" rows="10"> {{ old('description') }}</textarea>
    @error('description')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="duration">Duration:</label>
    <input type="number" name="duration" id="duration" value="{{ old('duration') }}">    
    @error('duration')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="cover">Cover:</label>
    <input type="file" name="cover" id="cover" accept="image/*">    
    @error('cover')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="file">Film:</label>
    <input type="file" name="file" id="file" accept="vidio/*">    
    @error('file')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="release_date">Release Data:</label>
    <input type="date" name="release_date" id="release_date" value="{{ old('release_date') }}">    
    @error('release_date')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>

    <label for="age_rating">Age Rating:</label>
    <select name="age_rating" id="age_rating">
        <option value="+19">Dewasa</option>
        <option value="+15">Remaja</option>
        <option value="+10">Anak Anak</option>
    </select>
    @error('genre')
        <span style="color:red">{{ $message}}</span>
    @enderror <br><br>


    <button type="submit">Save</button>
</form>
@endsection