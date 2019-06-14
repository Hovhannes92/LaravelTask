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
        $this->posts = Post::with('comments')->paginate(2);

        return $this;
    }

    public function getPosts()
    {
        return $this->posts;
    }



}