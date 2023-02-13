@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newsMirror.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-mirrors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.id') }}
                        </th>
                        <td>
                            {{ $newsMirror->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.title') }}
                        </th>
                        <td>
                            {{ $newsMirror->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.link') }}
                        </th>
                        <td>
                            {{ $newsMirror->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.guid') }}
                        </th>
                        <td>
                            {{ $newsMirror->guid }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.description') }}
                        </th>
                        <td>
                            {{ $newsMirror->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.author') }}
                        </th>
                        <td>
                            {{ $newsMirror->author }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.category') }}
                        </th>
                        <td>
                            {{ $newsMirror->category }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsMirror.fields.pub_date') }}
                        </th>
                        <td>
                            {{ $newsMirror->pub_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-mirrors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection