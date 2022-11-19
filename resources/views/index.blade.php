@extends('layouts/default')

@section('main')
    <div class="container p-3">
        <h2 class="mb-3">{{$users_name}}'s notes</h2>
        <div class="d-flex justify-content-end">
            <a href="/notes/add" class="btn btn-primary m-3">Add Note</a>
        </div>
        @if(isset($notes))
            <div class="row">
                @foreach($notes as $note)
                    <div class="col-12 col-md-4 col-xl-3 mb-3">
                        <div class="bg-light note d-flex flex-column position-relative">
                            @if($note->is_important)
                                <span class="important position-absolute">!</span>
                            @endif
                            <p>{{$note->note_body}}</p>
                            <div class="d-flex justify-content-between">
                                <form action="/notes/delete/{{$note->getKey()}}" method="POST" class="mb-0">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-secondary">Delete</button>
                                </form>
                                <a href="/notes/edit/{{$note->getKey()}}" class="btn btn-sm btn-secondary">Edit</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('head')
    @parent
    <style>
        .note {
            border-radius: 1rem;
            padding: 0.5rem;
        }
        .important{
            top:0.5rem;
            right:0.5rem;
            color: #ff413c;
        }
    </style>
@endsection
