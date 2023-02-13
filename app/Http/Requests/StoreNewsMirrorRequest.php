<?php

namespace App\Http\Requests;

use App\Models\NewsMirror;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewsMirrorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('news_mirror_create');
    }

    public function rules()
    {
        return [
            'title' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
            'guid' => [
                'string',
                'nullable',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'author' => [
                'string',
                'nullable',
            ],
            'category' => [
                'string',
                'nullable',
            ],
            'pub_date' => [
                'string',
                'nullable',
            ],
        ];
    }
}
