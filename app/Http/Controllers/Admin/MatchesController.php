<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMatchRequest;
use App\Http\Requests\StoreMatchRequest;
use App\Http\Requests\UpdateMatchRequest;
use App\Team;
use App\Match;
use App\TeamPoints;

class MatchesController extends Controller
{
    public function index()
    {
        $matches = Match::all(); 
        return view('admin.matches.index', compact('matches'));
    }

    public function create()
    {
        $teams = Team::pluck('name', 'id');
        return view('admin.matches.create', compact('teams'));
    }

    public function store(StoreMatchRequest $request)
    {
        try {
            if ($request->isMethod('post')) {

                $winningPoints = 2;

                $selected_teams = array($request->firstteam_id, $request->secondteam_id);

                if (!in_array($request->winningteam_id, $selected_teams)) {
                    return redirect()->route('admin.matches.index')->with('warning','Warning! Please select winning team either from First Team or Second Team selected.');    
                }

                $match_form_data = array(
                        'match_title'   =>   $request->match_title,
                        'firstteam_id'  =>   $request->firstteam_id,
                        'secondteam_id' =>   $request->secondteam_id,
                        'winningteam_id'=>   $request->winningteam_id,
                );

                $last_match_id = Match::create($match_form_data);

                $points_data = array(
                        'match_id'       =>  $last_match_id->id,
                        'team_id'       =>   $request->winningteam_id,
                        'points'        =>   $winningPoints,
                );

                TeamPoints::create($points_data);

                return redirect()->route('admin.matches.index')->with('success','Match information saved successfully. Points goes to winning team');
            }
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.matches.index')->with('error', 'Something went wrong');
        }
    }

    public function edit(Match $match)
    {
        $teams = Team::pluck('name', 'id');
        return view('admin.matches.edit', compact('match','teams'));
    }

    public function update(UpdateMatchRequest $request, Match $match, TeamPoints $teampoints)
    {
            if ($request->isMethod('put')) {
                $winningPoints = 2;
                $match_form_data = array(
                        'match_title'    =>  $request->match_title,
                        'firstteam_id'   =>  $request->firstteam_id,
                        'secondteam_id'  =>  $request->secondteam_id,
                        'winningteam_id' =>  $request->winningteam_id,
                );
                 
                $points_data = array( 
                        'team_id'        =>  $request->winningteam_id,
                        'points'         =>  $winningPoints,
                );
                
                $selected_teams = array($request->firstteam_id, $request->secondteam_id);

                if (!in_array($request->winningteam_id, $selected_teams)) {
                    return redirect()->route('admin.matches.index')->with('warning','Warning! Please select winning team either from First Team or Second Team selected.');    
                }

                $match->update($match_form_data);
                $teampoints->where('match_id',$match->id)->update($points_data);

                return redirect()->route('admin.matches.index')->with('success','Match and Points information updated successfully.');
            }
        
    }

    public function show(Match $match)
    {
        return view('admin.matches.show', compact('match'));
    }

    public function destroy(Match $match)
    {
        $match->delete();
        return redirect()->route('admin.matches.index')->with('success','Match information deleted successfully.');
    }
}