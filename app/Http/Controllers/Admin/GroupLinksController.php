<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupLinkRequest;
use App\Http\Requests\StoreGroupLinkRequest;
use App\Http\Requests\UpdateGroupLinkRequest;
use App\Models\GroupLink;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupLinksController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('group_link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupLinks = GroupLink::all();

        return view('admin.groupLinks.index', compact('groupLinks'));
    }

    public function create()
    {
        abort_if(Gate::denies('group_link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupLinks.create');
    }

    public function store(StoreGroupLinkRequest $request)
    {
        $groupLink = GroupLink::create($request->all());

        return redirect()->route('admin.group-links.index');
    }

    public function edit(GroupLink $groupLink)
    {
        abort_if(Gate::denies('group_link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupLinks.edit', compact('groupLink'));
    }

    public function update(UpdateGroupLinkRequest $request, GroupLink $groupLink)
    {
        $groupLink->update($request->all());

        return redirect()->route('admin.group-links.index');
    }

    public function show(GroupLink $groupLink)
    {
        abort_if(Gate::denies('group_link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.groupLinks.show', compact('groupLink'));
    }

    public function destroy(GroupLink $groupLink)
    {
        abort_if(Gate::denies('group_link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupLink->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupLinkRequest $request)
    {
        GroupLink::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
