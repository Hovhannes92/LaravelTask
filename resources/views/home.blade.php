@extends('layouts.app')

@section('content')

    <form action="/posts/create">
        <button type="submit" class="btn btn-primary">Create New Post</button>
        <input type="hidden" value="{{ Session::token() }}" name="_token">
    </form>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </div>
    </div>
</div>
<body>

@foreach($posts as $post)

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <form action="/posts/{{$post->id}}/edit">
                <button type="submit" class="btn btn-primary">Edit</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
            <br>
            <form action="/posts/{{$post->id}}" method="post">
                @method('DELETE')
                <button type="submit" class="btn btn-primary">Delete</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>

            <!-- Title -->
            <h2 class="mt-4">{{ $post->title }}</h2>

            <!-- Author -->
            <p class="lead">
                by
                <a href="#">{{ $post->user->name }}</a>
            </p>

            <!-- Preview Image -->
            <h2  style="color: red">{{ $post->body }}</h2>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form action="/post/{{$post->id}}/comment" method="post">
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            @if(Auth::check())

            @foreach($post->comments as $comment)
            <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">{{ $comment->body }}
                    </h5>
                </div>
            </div>
                @endforeach()

            @endif
        </div>

    </div>
    <!-- /.row -->
    <hr style="height:10px;border:none;color:green;background-color:green;">
</div>
<!-- /.container -->

@endforeach

<!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->

@endsection
