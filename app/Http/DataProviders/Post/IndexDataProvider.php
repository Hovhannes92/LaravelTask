<?php


namespace App\Http\DataProviders\Post;


use App\Post;

class IndexDataProvider
{
    private $posts;

    public function prepareData()
    {
        //@TODO load with lazyy loading comments
        $this->posts = Post::all();

        return $this;
    }

    public function getPosts()
    {
        return $this->posts;
    }



}