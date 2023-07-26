<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'unique:users',
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'required',
                'array',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'phone_otp' => [
                'string',
                'nullable',
            ],
            'parking_location_assigneds.*' => [
                'integer',
            ],
            'parking_location_assigneds' => [
                'array',
            ],
        ];
    }
}
