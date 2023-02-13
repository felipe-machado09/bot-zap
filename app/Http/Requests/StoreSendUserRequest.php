<?php

namespace App\Http\Requests;

use App\Models\SendUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSendUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('send_user_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
        ];
    }
}
