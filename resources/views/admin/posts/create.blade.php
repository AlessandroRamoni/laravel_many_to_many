@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <h2>Form errors: please fill all spaces correctly!</h2>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input required maxlength="255" type="text" name="title" value="{{ old('title') }}">
            @error('title')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div>
            <label for="category_id">Categoria:</label>
            <select name="category_id">
                <option value="">Nessuna</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', -1) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="content">Content:</label>
            <textarea required name="content" cols="30" rows="10">{{ old('content') }}</textarea>
            @error('content')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div @error('tags') class="is-invalid" @enderror>
            <label>Tags:</label>
            @foreach ($tags as $tag)
                <label>{{ $tag->name }}</label>
                <input type="checkbox" name="tags[]" value={{ $tag->id }}>
            @endforeach
        </div>

        <input type="submit" value="Create">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
