<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySendUserRequest;
use App\Http\Requests\StoreSendUserRequest;
use App\Http\Requests\UpdateSendUserRequest;
use App\Models\SendUser;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendUsersController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('send_user_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendUsers = SendUser::all();

        return view('admin.sendUsers.index', compact('sendUsers'));
    }

    public function create()
    {
        abort_if(Gate::denies('send_user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendUsers.create');
    }

    public function store(StoreSendUserRequest $request)
    {
        $sendUser = SendUser::create($request->all());

        return redirect()->route('admin.send-users.index');
    }

    public function edit(SendUser $sendUser)
    {
        abort_if(Gate::denies('send_user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendUsers.edit', compact('sendUser'));
    }

    public function update(UpdateSendUserRequest $request, SendUser $sendUser)
    {
        $sendUser->update($request->all());

        return redirect()->route('admin.send-users.index');
    }

    public function show(SendUser $sendUser)
    {
        abort_if(Gate::denies('send_user_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sendUsers.show', compact('sendUser'));
    }

    public function destroy(SendUser $sendUser)
    {
        abort_if(Gate::denies('send_user_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sendUser->delete();

        return back();
    }

    public function massDestroy(MassDestroySendUserRequest $request)
    {
        SendUser::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
