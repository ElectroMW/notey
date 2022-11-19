@extends('layouts/default')

@section('main')
    <div class="container">
        <h1>Create account</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">
                    Name
                </label>
                <input class="form-control" name="name" type="text" id="name">
                <label for="email">
                    Email
                </label>
                <input class="form-control" name="email" type="email" id="email">
                <label for="password">
                    Password
                </label>
                <input class="form-control" name="password" type="password" id="password">
                <button class="btn btn-primary">Create account</button>
            </div>
        </form>
        @if(isset($error_messages))
            <div class="warning">
                @foreach($error_messages as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
    </div>
@endsection
