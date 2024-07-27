@extends('layouts.app')
@section('content')
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="form">
                    <div class="px-3">
                        <a class="back-arrow btn btn-secondary go-back" href="{{ route('admin.projects.index') }}"><i
                                class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <form action="{{ route('admin.projects.store') }}" method="POST">
                        @csrf
                        <div class="form-content">
                            <label for="title">Title: </label>
                            <input type="text" name="title" value="{{ old('title') }}">
                            @error('title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-content">
                            <label for="description">Description: </label>
                            <input type="text" name="description" value="{{ old('description') }}">
                            @error('description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-content">
                            <label for="type">Type: </label>
                            <select name="type_id" id="type_id">
                                <option value="">Select Category</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if (old('type_id') == $type->id) selected @endif>
                                        {{ $type->title }}</option>
                                @endforeach
                            </select>
                            @error('type_id')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-content">
                            <label for="technology_id">Technologies: </label>
                            <hr>
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach ($techs as $tech)
                                    <div class="col-4 d-flex flex-column justfy-content-center align-items-center">
                                        <span class="mb-2">{{ $tech->title }}</span>
                                        <input class="checkbox" name="{{ $tech->title }}" type="checkbox"
                                            value="{{ $tech->id }}">
                                    </div>
                                @endforeach
                            </div>
                            @error('technology_id')
                                <p class="error">{{ $message }}</p>
                            @enderror
                            <hr>
                        </div>

                        <div class="form-content">
                            <label for="thumb">Image URL :</label>
                            <input type="text" name="image"
                                value={{ old('image') ?: 'https://picsum.photos/200/300' }}>
                            @error('thumb')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="button mt-4">
                            <button class="btn btn-success">Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
