@extends('layouts/default')

@section('main')
    <div class="container">
        <h1>Login to Notey!</h1>
        @if(isset($error))
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endif
        <form action="/login" method="POST">
            @csrf
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
            <div class="form-group d-flex justify-content-end">
                <button class="btn btn-primary">Login</button>
            </div>
        </form>
        <div class="d-flex justify-content-end mt-3">
            <div>
                <p class="mb-1">No account?</p>
                <a href="/register" class="btn btn-secondary">
                    Register
                </a>
            </div>
        </div>
    </div>
@endsection
