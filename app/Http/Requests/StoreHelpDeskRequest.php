<?php

namespace App\Http\Requests;

use App\Models\HelpDesk;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreHelpDeskRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('help_desk_create');
    }

    public function rules()
    {
        return [
            'user_id' => [
                'required',
                'integer',
            ],
            'ticket' => [
                'string',
                'nullable',
            ],
            'subject' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
