@extends('layouts.admin')
@section('content')

    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.matches.create") }}">
                {{ trans('global.add') }} {{ trans('global.match.title_singular') }}
            </a>
            <a class="btn btn-success" href="{{ route("admin.fixtures.show",1) }}">
                {{ trans('global.match.title_fixtures') }}
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('info'))
        <div class="alert alert-info">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('error'))
    <div class="alert alert-error">
       <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('warning'))
        <div class="alert alert-warning alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{{ $message }}</strong>
        </div>  
    @endif

<div class="card">
    <div class="card-header">
        {{ trans('global.match.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th>
                            {{ trans('global.match.fields.match_title') }}
                        </th>
                        <th>
                            {{ trans('global.match.fields.firstteam_id') }}
                        </th>
                        <th>
                            {{ trans('global.match.fields.secondteam_id') }}
                        </th>
                        <th>
                            {{ trans('global.match.fields.winningteam_id') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($matches as $key => $match)
                        <tr data-entry-id="{{ $match->id }}">
                            <td>
                                {{ $match->match_title ?? '' }}
                            </td>
                            <td>
                                {{ $match->FirstTeam->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->SecondTeam->name ?? '' }}
                            </td>
                            <td>
                                {{ $match->WinningTeam->name ?? 'Result awaited...' }}
                            </td>
                            <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('admin.matches.show', $match->id) }}">
                                        {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('admin.matches.edit', $match->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                <form action="{{ route('admin.matches.destroy', $match->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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