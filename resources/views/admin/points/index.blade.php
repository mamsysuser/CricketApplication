@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.point.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.point.fields.team') }}
                        </th>
                        <th>
                            {{ trans('global.point.fields.points') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $key => $point)
                        <tr data-entry-id="{{ $point->id }}">
                            <td>
                             <img src="{{url('/images/team-logos/'.$point->team->logoUri)}}" alt="{{$point->team->name}}" height="50" width="50" />
                            </td>
                            <td>
                                {{ $point->team->name ?? '' }}
                            </td>
                            <td>
                                {{ $point->total_points ?? '' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection