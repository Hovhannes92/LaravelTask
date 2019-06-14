<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
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
            'title' => 'required|max:255|unique:posts,id,'.$this->post->id,
            'body' => 'required',
        ];
    }

    public function persist(){

        $this->post->update($this->all());

        return $this;
    }

    public function getPost()
    {
        return $this->post;
    }
}
