@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.match.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.match.fields.firstteam_id') }}
                    </th>
                    <td>
                        {{ $match->firstteam_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.match.fields.secondteam_id') }}
                    </th>
                    <td>
                        {{ $match->secondteam_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.match.fields.winningteam_id') }}
                    </th>
                    <td>
                        {{ $match->winningteam_id }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection