@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="form">
                    <a class="back-arrow" href="{{ route('admin.projects.show', $project) }}">&lt;-Go back</a>
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-content">
                            <label for="title">Title: </label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}">
                            @error('title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-content">
                            <label for="description">Description: </label>
                            <input type="text" name="description"
                                value="{{ old('description', $project->description) }}">
                            @error('description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-content">
                            <label for="type">Type: </label>
                            <select name="type_id" id="type_id">
                                <option value="">Seleziona Categoria</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}"
                                        {{ $type->id == old('type_id', $project->type_id) ? 'selected' : '' }}>
                                        {{ $type->title }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-content">
                            <label for="thumb">Image URL :</label>
                            <input type="text" name="image" value="{{ old('image', $project->image) }}">
                            @error('thumb')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="button">
                            <button class="btn btn-success">Edit Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
