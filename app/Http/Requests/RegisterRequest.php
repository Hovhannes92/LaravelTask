<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ];
    }

    public function registerStore()
    {
           $this->user = User::create(array_merge($this->all(),['api_token' => str_random(50)]));
            return $this;
    }

    public function getUser()
    {
        return $this->user;
    }

}