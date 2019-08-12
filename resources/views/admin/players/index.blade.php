@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.players.create") }}">
                {{ trans('global.add') }} {{ trans('global.player.title_singular') }}
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
        {{ trans('global.player.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            {{ trans('global.player.fields.image') }}
                        </th>
                        <th>
                            {{ trans('global.player.fields.lastname') }}
                        </th>
                        <th>
                            {{ trans('global.player.fields.firstname') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $key => $player)
                        <tr data-entry-id="{{ $player->id }}">
                            <td>
                                <img src="{{url('/images/player-logos/'.$player->imageUri)}}" alt="{{$player->firstName}}" height="50" width="50" />
                            </td>
                            <td>
                                {{ $player->lastName ?? '' }}
                            </td>
                            <td>
                                {{ $player->firstName ?? '' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.players.show', $player->id) }}">
                                        {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.players.edit', $player->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                <form action="{{ route('admin.players.destroy', $player->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection