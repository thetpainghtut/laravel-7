@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Posts') }}
                    <a href="{{route('posts.create')}}" class="btn btn-success btn-sm float-right"><i class="fas fa-location-arrow"></i></a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{-- {{ __('You are logged in!') }} --}}
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Published Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=1; @endphp
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm"><i class="fas fa-angle-double-right"></i></a>
                                    <a href="#" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
