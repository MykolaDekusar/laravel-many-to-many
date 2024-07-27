@extends('layouts.app')
@section('content')
    <div class="container main-show ">
        <div class="row justify-content-center">
            <div class="col-12 mt-2">
                <div class="card p-3">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <a class="back-arrow btn btn-secondary go-back" href="{{ route('admin.projects.index') }}"><i
                                    class="fa-solid fa-arrow-left"></i></a>
                            <div class="delete col-2">
                                <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-6 p-4">
                            <h2 class="mt-2">{{ $project->title }}</h2>
                            <h5>{{ $project->description }}</h5>
                            <hr>
                            <h5>Categoria: {{ $project->type?->title ?: 'Categoria non specificata' }}</h5>
                            <hr>
                            <h5>Technologies :
                                @if (!$project->technologies->isEmpty())
                                    <p>
                                        @foreach ($project->technologies as $tech)
                                            {{ $tech->title }}
                                            <br>
                                        @endforeach
                                    </p>
                                @else
                                    <p>There are no technologies for this project</p>
                                @endif
                                <hr>
                            </h5>
                            <p>Created: {{ $project->created_at->format('H:i:s \o\n d/m/Y') }}</p>
                        </div>
                        <div class="image col p-4">
                            <img src="{{ $project->image }}" alt="">
                        </div>
                    </div>
                    <a class="btn btn-success col-2" href="{{ route('admin.projects.edit', $project) }}">Edit
                        Post</a>

                </div>
            </div>

        </div>
    </div>
@endsection
