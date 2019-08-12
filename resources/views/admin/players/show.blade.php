@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.player.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.player.fields.image') }}
                    </th>
                    <td>
                        <img src="{{url('/images/player-logos/'.$player->imageUri)}}" alt="{{$player->fiestName}}" height="80" width="80" />
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.player.fields.lastname') }}
                    </th>
                    <td>
                        {{ $player->lastName }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.player.fields.firstname') }}
                    </th>
                    <td>
                        {{ $player->firstName }}
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