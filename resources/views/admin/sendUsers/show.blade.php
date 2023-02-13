@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sendUser.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.send-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sendUser.fields.id') }}
                        </th>
                        <td>
                            {{ $sendUser->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendUser.fields.name') }}
                        </th>
                        <td>
                            {{ $sendUser->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendUser.fields.phone') }}
                        </th>
                        <td>
                            {{ $sendUser->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sendUser.fields.active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $sendUser->active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.send-users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection