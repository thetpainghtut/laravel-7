@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Add New Post') }}
                    <a href="#" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <form method="post" action="{{route('posts.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="inputTags">Tags:</label>
                            <select class="form-control js-example-basic-multiple" name="tags[]" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="inputTitle">Title:</label>
                            <input type="text" name="title" class="form-control" id="inputTitle">
                        </div>

                        <div class="form-group">
                            <label for="inputContent">Content:</label>
                            <textarea class="form-control summernote" name="content" id="inputContent"></textarea>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="btn-save" class="btn btn-success" value="Upload">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
