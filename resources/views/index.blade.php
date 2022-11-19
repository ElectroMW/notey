@extends('layouts/default')

@section('main')
    <div class="container">
        <h1>Notey!</h1>
        <h2>Welcome back - {{$users_name}}</h2>
        <div class="row">
            <div class="col-12">
                <a href="/notes/add">Add Note</a>
            </div>
        </div>
        <h2>Notes</h2>
        @if(isset($notes))
            <div class="row">
                @foreach($notes as $note)
                    <div class="col">
                        @if($note->is_important)
                            <p class="text-alert">Important</p>
                        @endif
                        <p>{{$note->note_body}}</p>
                        <a href="/notes/edit/{{$note->getKey()}}">Edit note</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
