@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>List of tags</h1>
@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-secondary" href="{{ route('admin.tags.create') }}"> Add tag</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td width="10px">
                            <a class="btn btn-primary" href="{{ route('admin.tags.edit', $tag) }}">Edit</a>
                        </td>
                        <td width="10px">
                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


