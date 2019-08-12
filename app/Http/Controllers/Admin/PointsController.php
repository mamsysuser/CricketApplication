<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatchRequest;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Team;
use App\TeamPoints;

class PointsController extends Controller
{
    public function index()
    {
        $points = TeamPoints::selectRaw('SUM(points) as total_points, team_id')->where('team_id','<>',null)->groupBy('team_id')->orderby('total_points', 'DESC')->get();
        return view('admin.points.index', compact('points'));
    }
}