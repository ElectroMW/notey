@extends('layouts/default')

@section('main')
    <div class="container">
        <form action="@yield('form-action')" method="POST">
            @csrf
            <div class="form-group">
                <label for="note_body">
                    Note
                </label>
                <textarea name="note_body" id="note_body">
                    @if(isset($note_body))
                        {{$note_body}}
                    @endif
                </textarea>
                <label for="is_important">
                    Important
                </label>
                <input type="checkbox" name="is_important" id="is_important" @if(isset($is_important) && $is_important) checked @endif>
                <button type="submit" class="btn btn-primary">
                    @yield('button-text')
                </button>
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
