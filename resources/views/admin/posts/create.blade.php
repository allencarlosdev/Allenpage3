@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>Create Posts</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store','autocomplete' => 'off']) !!}
                <div class="form-group">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Enter the name of the post']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug:') !!}
                    {!! Form::text('slug', null, ['class' =>'form-control', 'placeholder' => 'Enter the slug of the post', 'readonly']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id',$categories,null, ['class' =>'form-control']) !!}
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Tags</p>
                    @foreach($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{ $tag->name }}
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Status</p>
                        <label class="mr-2">
                            {!! Form::radio('status', 1, true) !!}
                            Unpublished
                        </label>

                        <label>
                            {!! Form::radio('status', 2) !!}
                            Published
                        </label>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Extract') !!}
                    {!! Form::textarea('extract',null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Post body') !!}
                    {!! Form::textarea('body',null,['class' => 'form-control']) !!}
                </div>
                {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
    <script>
        $("#name").keyup(function(){
            var str= $(this).val();
            var trims = $.trim(str)
            var slug = trims.replace(/[^a-z0-9]+/g,'-').replace(/-+/g, '-').replace(/^-|-$/g, '')
            $("#slug").val(slug.toLowerCase())
        });

        ClassicEditor
        .create(document.querySelector('#extract'))
        .catch(error => {
            console.error(error);
        });

        ClassicEditor
        .create(document.querySelector('#body'))
        .catch(error => {
            console.error(error);
        });

    </script>
@endsection
