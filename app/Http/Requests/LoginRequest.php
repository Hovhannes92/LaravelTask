<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class LoginRequest extends FormRequest
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
            //
        ];
    }

    public function loginAttempt()
    {

        $credentials = [
            'email' => $this['email'],
            'password' => $this['password'],
        ];

        abort_if(!Auth::attempt($credentials), 403, 'Unauthorized.');

        Auth::user()->update(['api_token' => str_random(50)]);
    }
}
