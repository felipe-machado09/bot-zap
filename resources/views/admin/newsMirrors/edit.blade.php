@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.newsMirror.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.news-mirrors.update", [$newsMirror->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">{{ trans('cruds.newsMirror.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $newsMirror->title) }}">
                @if($errors->has('title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="link">{{ trans('cruds.newsMirror.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', $newsMirror->link) }}">
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="guid">{{ trans('cruds.newsMirror.fields.guid') }}</label>
                <input class="form-control {{ $errors->has('guid') ? 'is-invalid' : '' }}" type="text" name="guid" id="guid" value="{{ old('guid', $newsMirror->guid) }}">
                @if($errors->has('guid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('guid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.guid_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.newsMirror.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $newsMirror->description) }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="author">{{ trans('cruds.newsMirror.fields.author') }}</label>
                <input class="form-control {{ $errors->has('author') ? 'is-invalid' : '' }}" type="text" name="author" id="author" value="{{ old('author', $newsMirror->author) }}">
                @if($errors->has('author'))
                    <div class="invalid-feedback">
                        {{ $errors->first('author') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.author_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="category">{{ trans('cruds.newsMirror.fields.category') }}</label>
                <input class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" type="text" name="category" id="category" value="{{ old('category', $newsMirror->category) }}">
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="pub_date">{{ trans('cruds.newsMirror.fields.pub_date') }}</label>
                <input class="form-control {{ $errors->has('pub_date') ? 'is-invalid' : '' }}" type="text" name="pub_date" id="pub_date" value="{{ old('pub_date', $newsMirror->pub_date) }}">
                @if($errors->has('pub_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pub_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newsMirror.fields.pub_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection