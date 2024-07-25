@extends('layouts.app')
@section('content')
    <div class="container">
        <a class="btn btn-primary col-2 mt-4" href="{{ route('admin.projects.create') }}">Crea nuovo post</a>
        <div class="row justify-content-center">
            @if ($posts->isEmpty())
                <h1 class="text-light mt-3">Oooops {{ Auth::user()->name }} sembra che non ci siano post... Perchè non ne
                    crei
                    uno? </h1>
            @endif
            @if (session('message'))
                <div class="alert alert-success col-11 mt-4">
                    {{ session('message') }}
                </div>
            @endif
            <div class="mt-4">{{ $posts->links() }}</div>
            @foreach ($posts as $data)
                <div class="col-12 mt-2">
                    <div class="card p-3 text-center">
                        <h2>{{ $data->title }}</h2>
                        <div class="image">
                            <img src="{{ $data->image }}" alt="">
                        </div>
                        <div class="d-flex buttons justify-content-between">
                            <a class="btn btn-success" href="{{ route('admin.projects.show', $data) }}">Details</a>
                            <form action="{{ route('admin.projects.destroy', $data) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Delete Post</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="mt-4">{{ $posts->links() }}</div>
        </div>
    </div>
@endsection
