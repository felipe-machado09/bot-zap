<?php

namespace App\Http\Requests;

use App\Models\GroupLink;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGroupLinkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('group_link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:group_links,id',
        ];
    }
}
