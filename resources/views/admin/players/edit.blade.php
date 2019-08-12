@extends('layouts.admin')
@section('content')

<div class="card">
   <div class="card-header">
      {{ trans('global.edit') }} {{ trans('global.player.title_singular') }}
   </div>
   <div class="card-body">
      <form action="{{ route("admin.players.update", [$player->id]) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group {{ $errors->has('team_id') ? 'has-error' : '' }}">
         <label for="team">{{ trans('global.team.title_singular') }}*</label>
         <select class="form-control" name="team_id" id="team_id">
            <option value="" selected>Select Team</option>
            @foreach ($teams as $key => $value)
            <option value="{{ $key }}"
            {{ $player->team_id == $key ? 'selected' : '' }}
            > 
            {{ $value }} 
            </option>
            @endforeach    
         </select>
         @if($errors->has('team_id'))
         <em class="invalid-feedback">
         {{ $errors->first('team_id') }}
         </em>
         @endif
      </div>
      <div class="form-group {{ $errors->has('firstName') ? 'has-error' : '' }}">
         <label for="firstName">{{ trans('global.player.fields.firstname') }}*</label>
         <input type="text" id="firstName" name="firstName" class="form-control" value="{{ old('firstName', isset($player) ? $player->firstName : '') }}">
         @if($errors->has('firstName'))
         <em class="invalid-feedback">
         {{ $errors->first('firstName') }}
         </em>
         @endif
      </div>
      <div class="form-group {{ $errors->has('lastName') ? 'has-error' : '' }}">
         <label for="lastName">{{ trans('global.player.fields.lastname') }}*</label>
         <input type="text" id="lastName" name="lastName" class="form-control" value="{{ old('lastName', isset($player) ? $player->lastName : '') }}">
         @if($errors->has('lastName'))
         <em class="invalid-feedback">
         {{ $errors->first('lastName') }}
         </em>
         @endif
      </div>
      <div class="form-group {{ $errors->has('imageUri') ? 'has-error' : '' }}">
         <label for="imageUri">{{ trans('global.player.fields.image') }}</label>
         <input type="file" name="imageUri" class="form-control" value="{{ old('imageUri', isset($player) ? $player->imageUri : '') }}">
         @if($errors->has('imageUri'))
         <em class="invalid-feedback">
         {{ $errors->first('imageUri') }}
         </em>
         @endif
      </div>
      <div class="form-group {{ $errors->has('jerseyNo') ? 'has-error' : '' }}">
         <label for="jerseyNo">{{ trans('global.player.fields.jerseyNo') }}*</label>
         <input type="text" id="jerseyNo" name="jerseyNo" class="form-control" value="{{ old('jerseyNo', isset($player) ? $player->jerseyNo : '') }}">
         @if($errors->has('jerseyNo'))
         <em class="invalid-feedback">
         {{ $errors->first('jerseyNo') }}
         </em>
         @endif
      </div>
      <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
         <label for="team">{{ trans('global.player.fields.country') }}*</label>
         <select class="form-control" name="country_id">
            <option>Country</option>
            @foreach ($countries as $key => $value)
            <option value="{{ $key }}"
            {{ $player->country_id == $key ? 'selected' : '' }}
            > 
            {{ $value }} 
            </option>
            @endforeach    
         </select>
         @if($errors->has('country_id'))
         <em class="invalid-feedback">
         {{ $errors->first('country_id') }}
         </em>
         @endif
      </div>
      <div class="form-row">
         <div class="form-group col-md-4">
            <label for="inputCity">{{ trans('global.player.fields.matches') }}</label>
            <input type="text" class="form-control" id="matches" name="matches" value="{{ old('matches', isset($player_history_data['matches']) ? $player_history_data['matches'] : '') }}">
            @if($errors->has('matches'))
            <em class="invalid-feedback">
            {{ $errors->first('matches') }}
            </em>
            @endif
         </div>
         <div class="form-group col-md-4">
            <label for="inputState">{{ trans('global.player.fields.runs') }}</label>
            <input type="text" class="form-control" id="runs" name="runs" value="{{ old('runs', isset($player_history_data['runs']) ? $player_history_data['runs'] : '') }}">
            @if($errors->has('runs'))
            <em class="invalid-feedback">
            {{ $errors->first('runs') }}
            </em>
            @endif
         </div>
         <div class="form-group col-md-4">
            <label for="inputZip">{{ trans('global.player.fields.highest_score') }}</label>
            <input type="text" class="form-control" id="highest_score" name="highest_score" value="{{ old('highest_score', isset($player_history_data['highest_score']) ? $player_history_data['highest_score'] : '') }}">
            @if($errors->has('highest_score'))
            <em class="invalid-feedback">
            {{ $errors->first('highest_score') }}
            </em>
            @endif
         </div>
      </div>
      <div class="form-row">
         <div class="form-group col-md-4">
            <label for="inputCity">{{ trans('global.player.fields.hundreds') }}</label>
            <input type="text" class="form-control" id="hundreds" name="hundreds" value="{{ old('hundreds', isset($player_history_data['hundreds']) ? $player_history_data['hundreds'] : '') }}">
            @if($errors->has('hundreds'))
            <em class="invalid-feedback">
            {{ $errors->first('hundreds') }}
            </em>
            @endif
         </div>
         <div class="form-group col-md-4">
            <label for="inputState">{{ trans('global.player.fields.fifties') }}</label>
            <input type="text" class="form-control" id="fifties" name="fifties" value="{{ old('fifties', isset($player_history_data['fifties']) ? $player_history_data['fifties'] : '') }}">
            @if($errors->has('fifties'))
            <em class="invalid-feedback">
            {{ $errors->first('fifties') }}
            </em>
            @endif
         </div>
         <div class="form-group col-md-4">
            <label for="inputZip">{{ trans('global.player.fields.wickets') }}</label>
            <input type="text" class="form-control" id="wickets" name="wickets" value="{{ old('wickets', isset($player_history_data['wickets']) ? $player_history_data['wickets'] : '') }}">
            @if($errors->has('wickets'))
            <em class="invalid-feedback">
            {{ $errors->first('wickets') }}
            </em>
            @endif
         </div>
      </div>
      <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
      <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
   </div>
   </form>
</div>
</div>
@endsection