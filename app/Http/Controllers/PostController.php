<?php

namespace App\Http\Controllers;

use App\Http\DataProviders\Post\IndexDataProvider;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\IndexPostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\DestroyPostRequest;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\ShowPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    // @TODO make request for controller all methods  ...done
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPostRequest $request, IndexDataProvider $dataProvider)
    {
        //@TODO use dataProvider
        return view('home', ['posts' => Post::with('comments')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreatePostRequest $request)
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $request->persist();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowPostRequest $request, Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditPostRequest $request, Post $post)
    {
        //@TODO do with route binding ... done
        $post->first();
        return view('edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
                $request->persist();

                return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyPostRequest $request, Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }
}
