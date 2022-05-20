@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>User List</h1>
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
