@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>List of Posts</h1>
@stop

@section('content')
    @livewire('admin.posts-index')
@stop

