@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.groupLink.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.groupLink.fields.id') }}
                        </th>
                        <td>
                            {{ $groupLink->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupLink.fields.title') }}
                        </th>
                        <td>
                            {{ $groupLink->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupLink.fields.link') }}
                        </th>
                        <td>
                            {{ $groupLink->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupLink.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $groupLink->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection