@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>Create Tags</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        {!! Form::open(['route' => 'admin.tags.store']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter the name of the tag']) !!}

                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug') !!}
                {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Enter the slug of the tag', 'readonly']) !!}

                @error('slug')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {!! Form::submit('Create tag', ['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script>
        $("#name").keyup(function(){
            var str= $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]+/g,'-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase())
        })
    </script>
@endsection
