<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class RegistrationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'                  => ['required', 'string', 'max:150'],
            'email'                 => ['required', 'email', 'string', 'max:150', 'unique:users,email'],
            'password'              => ['required', 'string', 'min:8','max:255', 'confirmed']
        ];
    }
    public function messages()
    {
        return [
            'name.required'         => 'Name is required',
            'email.required'        => 'Email is required',
            'email.email'           => 'Email is invalid',
            'email.unique'          => 'Email is already taken',
            'password.required'     => 'Password is required',
            'password.min'          => 'Password must be at least 8 characters',
            'password.confirmed'    => 'Passwords do not match'
        ];
    }
    public function getSanitized()
    {
        $data                       = $this->validated();
        $data['password']           = bcrypt($data['password']);
        $data['email_verified_at']  = now();
        $data['status_active']      = 1;
        $data['is_delete']          = 0;
        $data['created_at']         = now();
        $data['updated_at']         = null;
        $data['role']               = 'Customer';
        $data['remember_token']     = Str::random(10);
        return $data;
    }
}
