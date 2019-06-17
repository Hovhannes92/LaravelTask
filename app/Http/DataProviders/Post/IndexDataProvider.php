<?php


namespace App\Http\DataProviders\Post;


use App\Post;
use App\Comment;

class IndexDataProvider
{
    private $posts;

    public function prepareData()
    {
        //@TODO load with lazyy loading comments ...done
        $this->posts = Post::with('comments')->get();

        return $this;
    }

    public function getPosts()
    {
        return $this->posts;
    }



}