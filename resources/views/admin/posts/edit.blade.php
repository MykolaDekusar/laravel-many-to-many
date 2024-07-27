@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="form">
                    <div class="px-3">
                        <!-- Back btn -->
                        <a class="back-arrow btn btn-secondary go-back" href="{{ route('admin.projects.index') }}"><i
                                class="fa-solid fa-arrow-left"></i></a>
                    </div>
                    <form action="{{ route('admin.projects.update', $project) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- Title -->
                        <div class="form-content">
                            <label for="title">Title: </label>
                            <input type="text" name="title" value="{{ old('title', $project->title) }}">
                            @error('title')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Description -->
                        <div class="form-content">
                            <label for="description">Description: </label>
                            <input type="text" name="description"
                                value="{{ old('description', $project->description) }}">
                            @error('description')
                                <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Type -->
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
                        <!-- Technologies -->
                        <div class="form-content">
                            <label for="technology_id">Technologies: </label>
                            <hr>
                            <div class="d-flex flex-wrap justify-content-between">
                                @foreach ($techs as $tech)
                                    <div class="col-4 d-flex flex-column justfy-content-center align-items-center">
                                        @if ($errors->any())
                                            {{-- se ho gli errori rimetto i checkbox di prima --}}
                                            <div class="col-4 d-flex flex-column justfy-content-center align-items-center">
                                                <span class="mb-2">{{ $tech->title }}</span>
                                                <input class="checkbox" name="techs[]" type="checkbox"
                                                    value="{{ $tech->id }}"
                                                    {{ in_array($tech->id, old('techs', [])) ? 'checked' : '' }}>
                                            </div>
                                        @else
                                            {{-- se non ho errori metto i checkbox settati --}}
                                            <div class="col-4 d-flex flex-column justfy-content-center align-items-center">
                                                <span class="mb-2">{{ $tech->title }}</span>
                                                {{-- techs[] le parentesi permettono di inviare un array di checkbox se selezionato piu di 1 --}}
                                                <input class="checkbox" name="techs[]" type="checkbox"
                                                    value="{{ $tech->id }}"
                                                    {{ $project->technologies->contains($tech) ? 'checked' : '' }}>
                                            </div>
                                        @endif


                                    </div>
                                @endforeach
                            </div>
                            <hr>
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
