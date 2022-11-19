@extends('layouts/default')

@section('main')
    <div class="container">
        <h1>Login to Notey!</h1>
        <form action="/login" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">
                    Email
                </label>
                <input class="form-control" name="email" type="email" id="email">
                <label for="password">
                    Password
                </label>
                <input class="form-control" name="password" type="password" id="password">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
        <p>No account? - Register</p>
        <a href="/register" class="btn btn-secondary">
            Register
        </a>
        @if(isset($error))
            <div class="warning">
                <p>{{$error}}</p>
            </div>
        @endif
    </div>
@endsection
