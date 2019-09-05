<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class RegisterUserRequest extends Request
{
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|same:confirm',
            'confirm' => 'required|string'
        ];
    }
}
