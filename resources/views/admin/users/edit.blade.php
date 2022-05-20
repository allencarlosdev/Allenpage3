@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>Assign a role</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{ session('info') }}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p class="h5">Name:</p>
            <p class="form-control">{{ $user->name }}</p>
            <h2 class="h5">List of roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.update', $user],'method' =>'put']) !!}
                @foreach($roles as $role)
                    <div>
                        <label for="">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{ $role->name }}
                        </label>
                    </div>
                @endforeach
                {!! Form::submit('Assign role', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
