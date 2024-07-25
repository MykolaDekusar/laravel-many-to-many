@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="d-flex justify-content-between align-items-center">
                            {{ __('You are logged in!') }}
                            <a type="button" class="btn btn-success" href="{{ route('admin.projects.index') }}">Vai alla
                                lista</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
