<?php

namespace App\Http\Requests;

use App\Models\GroupLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateGroupLinkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('group_link_edit');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
            ],
            'link' => [
                'string',
                'required',
            ],
        ];
    }
}
