@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
   <div class="col-lg-12">
      <a class="btn btn-success" href="{{ route("admin.teams.create") }}">
      {{ trans('global.add') }} {{ trans('global.team.title_singular') }}
      </a>
   </div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
   <p>{{ $message }}</p>
</div>
@endif
<div class="card">
   <div class="card-header">
      {{ trans('global.team.title_singular') }} {{ trans('global.list') }}
   </div>
   <div class="card-body">
      <div class="table-responsive">
         <table class=" table table-bordered table-striped table-hover datatable">
            <thead>
               <tr>
                  <th>
                     {{ trans('global.team.fields.logo') }}
                  </th>
                  <th>
                     {{ trans('global.team.fields.name') }}
                  </th>
                  <th>
                     {{ trans('global.team.fields.club_state') }}
                  </th>
                  <th>
                     &nbsp;
                  </th>
               </tr>
            </thead>
            <tbody>
               @foreach($teams as $key => $team)
               <tr data-entry-id="{{ $team->id }}">
                  <td>
                     <img src="{{url('/images/team-logos/'.$team->logoUri)}}" alt="{{$team->name}}" height="50" width="50" />
                  </td>
                  <td>
                     <a class="" href="#" id= "{{$team->id}}" data-toggle="modal" data-target="#teamInfo{{$team->id}}">
                     {{ $team->name ?? '' }}
                     </a>
                  </td>
                  <td>
                     {{ $team->club_state ?? '' }}
                  </td>
                  <td>
                     <a class="btn btn-xs btn-info" href="{{ route('admin.teams.edit', $team->id) }}">
                     {{ trans('global.edit') }}
                     </a>
                     <form action="{{ route('admin.teams.destroy', $team->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                     </form>
                  </td>
               </tr>
               <!-- Modal -->
               <div class="modal fade" id="teamInfo{{$team->id}}" tabindex="-1" role="dialog" aria-labelledby="teamlabel{{$team->id}}"
                  aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <span><img src="{{url('/images/team-logos/'.$team->logoUri)}}" alt="{{$team->name}}" height="50" width="50" /></span>&nbsp;&nbsp;
                           <span>
                              <h5 class="modal-title" id="teamlabel{{$team->id}}"><b>{{$team->name}}</b></h5>
                              <b>{{ trans('global.team.fields.club_state') }}</b> {{$team->club_state}}
                           </span>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body mx-3">
                           <div class='form-row'>
                              <div class="col-xs-12 form-group">
                                 <label class='control-label'><b><u>{{ trans('global.player.title') }}</u></b></label>    
                              </div>
                           </div>
                           @if (count($team->players) > 0)
                           @foreach($team->players as $player)
                           @php
                              $history = unserialize($player->player_history);
                           @endphp
                           <div class='form-row'>
                              <div class="col-xs-12 form-group">
                                 <img src="{{url('/images/player-logos/'.$player->imageUri)}}" alt="{{$player->firstName}}" height="50" width="50" />
                                 <label class='control-label'><b>{{$player->firstName.' '.$player->lastName}}:</b>  <p><b>{{ trans('global.player.fields.jerseyNo') }}:</b> {{$player->jerseyNo}}, <b>{{ trans('global.player.fields.matches') }}:</b> {{$history['matches']}}, <b>{{ trans('global.player.fields.runs') }}:</b> {{$history['runs']}}, <b>{{ trans('global.player.fields.highest_score') }}:</b> {{$history['highest_score']}}, <b>{{ trans('global.player.fields.hundreds') }}:</b> {{$history['hundreds']}}, <b>{{ trans('global.player.fields.fifties') }}:</b> {{$history['fifties']}}, <b>{{ trans('global.player.fields.wickets') }}:</b> {{$history['wickets']}}</p></label>
                              </div>
                           </div>
                           @endforeach
                           @else
                           <p>No player exist in this team. Click here to <a class="" href="{{ route('admin.players.create' )}}">create players and assign team</a></p>
                           @endif
                        </div>
                        <div class="modal-footer">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection