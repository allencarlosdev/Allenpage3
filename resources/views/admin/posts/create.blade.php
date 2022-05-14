@extends('adminlte::page')

@section('title', 'Allenpage3')

@section('content_header')
    <h1>Create Posts</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store','autocomplete' => 'off', 'files' => true]) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('name','Name:') !!}
                    {!! Form::text('name', null, ['class' =>'form-control', 'placeholder' => 'Enter the name of the post']) !!}
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('slug','Slug:') !!}
                    {!! Form::text('slug', null, ['class' =>'form-control', 'placeholder' => 'Enter the slug of the post', 'readonly']) !!}
                @error('slug')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id',$categories,null, ['class' =>'form-control']) !!}
                @error('category_id')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    <p class="font-weight-bold">Tags</p>
                    @foreach($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{ $tag->name }}
                        </label>
                    @endforeach
                @error('tags')
                    <br>
                <small class="text-danger">{{ $message }}</small>
                @enderror
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

                @error('status')
                <br>
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div clas="image-wrapper">
                            <img id="picture" src="https://p4.wallpaperbetter.com/wallpaper/64/1005/89/minimalistic-circle-wallpaper-preview.jpg" alt="">
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Post image') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus optio omnis obcaecati modi, inventore natus in assumenda cum asperiores iusto temporibus facilis non ut pariatur, soluta reprehenderit, ipsa dolor animi.</p>
                    </div>
                </div>

                <div class="form-group">
                    {!! Form::label('extract', 'Extract') !!}
                    {!! Form::textarea('extract',null,['class' => 'form-control']) !!}
                @error('extract')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('body', 'Post body') !!}
                    {!! Form::textarea('body',null,['class' => 'form-control']) !!}
                @error('body')
                <small class="text-danger">{{ $message }}</small>
                @enderror
                </div>
                {!! Form::submit('Create post', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <style>
        .image-wrapper {
            position: relative;
            padding-bottom: 56.25%;
        }
        .image-wrapper img {
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
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

        //change image
        document.getElementById("file").addEventListener('change', changeImage);
        function changeImage(event){
            var file =  event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };

            reader.readAsDataURL(file);
        }
    </script>
@endsection
