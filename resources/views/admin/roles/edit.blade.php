@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>Edit Role</h1>
@stop

@section('content')
@if(session('info'))
    <div class="alert alert-success">
        <strong>{{ session('info') }}</strong>
    </div>
@endif
<div class="card">
    <div class="card-body">
        {!! Form::model($role, ['route'=> ['admin.roles.update', $role], 'method' => 'put']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class' =>'form-control', 'placeholder'=> 'Enter role name']) !!}
        @error('name')
            <small>
                {{ $message }}
            </small>
        @enderror

        </div>

        <h2 class="h3">List of permissions</h2>

        @foreach($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{ $permission->description }}
                </label>
            </div>
        @endforeach
        {!! Form::submit('Update Role', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop
