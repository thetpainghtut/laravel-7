@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{$post->title}}
                    <a href="#" class="btn btn-primary btn-sm float-right"><i class="far fa-arrow-alt-circle-left"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <p class="card-text">
                        {!!$post->content!!}
                    </p>

                    <p class="card-text">
                        @foreach($post->tags as $tag)
                            <span class="badge badge-primary px-2">{{$tag->name}}</span>
                        @endforeach
                    </p>

                    <span><i class="far fa-calendar-alt"></i> {{$post->created_at->diffForHumans()}}</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
