<?php

namespace App\Http\Requests;

use App\Comment;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'body' => 'required|unique:posts|max:255',
        ];
    }

    public function persist()
    {
        ['post_id' => $this->post->id];

        Auth::user()->comments()->create($this->all());



        return $this;

    }

    public function getComment()
    {
        return $this->comment;
    }
}
