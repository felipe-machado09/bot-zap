<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsMirrorRequest;
use App\Models\NewsMirror;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsMirrorsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_mirror_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsMirrors = NewsMirror::all();

        return view('admin.newsMirrors.index', compact('newsMirrors'));
    }

    public function show(NewsMirror $newsMirror)
    {
        abort_if(Gate::denies('news_mirror_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsMirrors.show', compact('newsMirror'));
    }

    public function destroy(NewsMirror $newsMirror)
    {
        abort_if(Gate::denies('news_mirror_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsMirror->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsMirrorRequest $request)
    {
        NewsMirror::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
