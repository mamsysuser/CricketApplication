@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.team.title_singular') }}
    </div>
    
    @if ($message = Session::get('info'))
    <div class="alert alert-success">
       <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body">
        <form action="{{route("admin.teams.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('global.team.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($team) ? $team->name : '') }}">
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('logoUri') ? 'has-error' : '' }}">
                <label for="logoUri">{{ trans('global.team.fields.logo') }}</label>
                <input type="file" name="logoUri" class="form-control" value="{{ old('logoUri', isset($team) ? $team->logoUri : '') }}">
                @if($errors->has('logoUri'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logoUri') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('club_state') ? 'has-error' : '' }}">
                <label for="club_state">{{ trans('global.team.fields.club_state') }}</label>
                <input type="text" id="club_state" name="club_state" class="form-control" value="{{ old('club_state', isset($team) ? $team->club_state : '') }}" step="0.01">
                @if($errors->has('club_state'))
                    <em class="invalid-feedback">
                        {{ $errors->first('club_state') }}
                    </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>
</div>

@endsection