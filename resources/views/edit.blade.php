@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Update post</h1>

                <form action="/posts/{{$post->id}}" method="post">
                    @method('PUT')
                    <div class="form-group has-error">
                        <label for="title" >Post Title</label>
                        <input type="text" value="{{$post->title}}" class="form-control" name="title" />
                    </div>
                    <div class="form-group">
                        <label for="body">Post Body</label>
                        <textarea rows="5" class="form-control" name="body" >{{$post->body}}</textarea>
                    </div>
                    <input  type="hidden" name="post_id" value="{{ $post->id }}" >
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection
