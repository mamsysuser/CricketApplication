@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.team.title') }}
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.team.fields.logo') }}
                    </th>
                    <td>
                        <img src="{{url('/images/team-logos/'.$team->logoUri)}}" alt="{{$team->name}}" height="80" width="80" />
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.team.title_singular') }}
                    </th>
                    <td>
                        {{ $team->name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.team.fields.club_state') }}
                    </th>
                    <td>
                        {{ $team->club_state }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.team.title_players') }}
                    </th>
                    <td>
                        @foreach($team->players as $player)
                        <p>
                            <u><b>{{ $player->firstName.' '.$player->lastName }}</b></u>
                            <u><p>{{ trans('global.team.title_player_history') }}: </p></u>
                        </p>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td><a href="{{ url()->previous() }}" class="btn btn-info">Back</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection