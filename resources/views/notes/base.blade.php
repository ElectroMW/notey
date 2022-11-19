@extends('layouts/default')

@section('main')
    <div class="container">
        @if(isset($error_messages))
            <div class="warning">
                @foreach($error_messages as $error)
                    <p class="alert alert-danger">{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="@yield('form-action')" method="POST">
            @csrf
            <div class="form-group">
                <label for="note_body">
                    Note
                </label>
                <textarea name="note_body" id="note_body" class="form-control">@if(isset($note_body)){{$note_body}}@endif</textarea>
            </div>
            <div class="form-group d-flex justify-content-between">
                <div>
                    <label for="is_important">
                        Important
                    </label>
                    <input type="checkbox" name="is_important" id="is_important" @if(isset($is_important) && $is_important) checked @endif>
                </div>
                <button type="submit" class="btn btn-primary">
                    @yield('button-text')
                </button>
            </div>
        </form>
    </div>
@endsection
