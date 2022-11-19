@extends('layouts/default')

@section('main')
    <div class="container">
        <h1>Create account</h1>
        @if(isset($error_messages))
            <div class="warning my-3">
                @foreach($error_messages as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">
                    Name
                </label>
                <input class="form-control" name="name" type="text" id="name">
            </div>
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input class="form-control" name="email" type="email" id="email">
            </div>
            <div class="form-group">
                <label for="password">
                    Password
                </label>
                <input class="form-control" name="password" type="password" id="password">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Create account</button>
            </div>
        </form>
    </div>
@endsection
