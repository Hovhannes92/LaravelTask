@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">

                <h1>Create post</h1>

                <form action="/posts" method="post">

                    <div class="form-group has-error">
                        <label for="title">Post Title</label>
                        <input type="text" class="form-control" name="title" />
                    </div>


                    <div class="form-group">
                        <label for="body">Post Body</label>
                        <textarea  rows="5" class="form-control" name="body" ></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                        <input type="hidden" value="{{ Session::token() }}" name="_token">
                    </div>

                </form>
            </div>

        </div>
    </div>

@endsection
