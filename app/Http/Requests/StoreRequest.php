<?php

namespace App\Http\Requests;

use App\Comment;
use App\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
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

//      dd($this->all());

        //@TODO check array_merge
        Auth::user()->comments()->create(array_merge([
            'post_id' => $this->post->id,
        ],
            $this->all()
        ));

        return $this;

    }

    public function getComment()
    {
        return $this->comment;
    }
}
