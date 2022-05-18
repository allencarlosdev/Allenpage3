@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>List of Posts</h1>
@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif
    @livewire('admin.posts-index')
@stop

