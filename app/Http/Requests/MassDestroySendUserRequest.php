<?php

namespace App\Http\Requests;

use App\Models\SendUser;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroySendUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('send_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:send_users,id',
        ];
    }
}
