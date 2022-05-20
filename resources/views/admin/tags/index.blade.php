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
            @can('admin.tags.create')
            <a class="btn btn-secondary" href="{{ route('admin.tags.create') }}"> Add tag</a>
            @endcan
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
                            @can('admin.tags.edit')
                            <a class="btn btn-primary" href="{{ route('admin.tags.edit', $tag) }}">Edit</a>
                            @endcan
                        </td>
                        <td width="10px">
                            @can('admin.tags.destroy')
                                <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop


