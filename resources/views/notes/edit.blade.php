@extends('notes/base')

@section('form-action', "/notes/edit/{$note->getKey()}")
@section('button-text', 'Update')
