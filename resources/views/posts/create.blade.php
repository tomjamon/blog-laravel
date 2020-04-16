@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ajouter un article</div>
                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" method="POST">
                            @method('POST')
                            @csrf
                            <input placeholder="title" class="form-control" type="text" name="title">
                            @error('title')
                                <div class="alert alert-danger"> {{ $message }}</div>
                            @enderror
                            <br>
                            <button class="btn btn-primary" type="submit">Ajouter l'article</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
