@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.match.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{route("admin.matches.store")}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('match_title') ? 'has-error' : '' }}">
                <label for="firstName">{{ trans('global.match.fields.match_title') }}*</label>
                <input type="text" id="match_title" name="match_title" class="form-control" value="{{ old('match_title', isset($match) ? $match->match_title : '') }}" placeholder="{{ trans('global.match.fields.match_title') }}">
                @if($errors->has('match_title'))
                    <em class="invalid-feedback">
                        {{ $errors->first('match_title') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('firstteam_id') ? 'has-error' : '' }}">
                <label for="firstteam_id">{{ trans('global.match.fields.firstteam_id') }}*</label>
                <select class="form-control" name="firstteam_id" id="firstteam_id">
                  <option value="" selected>Select First Team</option>
                  @foreach ($teams as $key => $value)
                    <option value="{{ $key }}"> 
                        {{ $value }} 
                    </option>
                  @endforeach    
                </select>
                @if($errors->has('firstteam_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('firstteam_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('secondteam_id') ? 'has-error' : '' }}">
                <label for="secondteam_id">{{ trans('global.match.fields.secondteam_id') }}*</label>
                <select class="form-control" name="secondteam_id" id="secondteam_id">
                  <option value="" selected>Select Second Team</option>
                  @foreach ($teams as $key => $value)
                    <option value="{{ $key }}"> 
                        {{ $value }} 
                    </option>
                  @endforeach    
                </select>
                @if($errors->has('secondteam_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('secondteam_id') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('winningteam_id') ? 'has-error' : '' }}">
                <label for="winningteam_id">{{ trans('global.match.fields.winningteam_id') }}*</label>
                <select class="form-control" name="winningteam_id" id="winningteam_id">
                  <option value="" selected>Select Winning Team</option>
                  @foreach ($teams as $key => $value)
                    <option value="{{ $key }}"> 
                        {{ $value }} 
                    </option>
                  @endforeach    
                </select>
                @if($errors->has('winningteam_id'))
                    <em class="invalid-feedback">
                        {{ $errors->first('winningteam_id') }}
                    </em>
                @endif
            </div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection