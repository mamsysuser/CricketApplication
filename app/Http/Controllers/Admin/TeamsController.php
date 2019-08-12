<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Team;

class TeamsController extends Controller
{
    public function index()
    {
            $teams = Team::all(); 
            return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {

        return view('admin.teams.create');
    }

    public function store(StoreTeamRequest $request)
    {
        try {
            if ($request->isMethod('post')) {

                if($request->hasFile('logoUri')){
                    $image = $request->file('logoUri'); 
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/team-logos'), $image_name);
                }

                $form_data = array(
                        'name'       =>   $request->name,
                        'logoUri'    =>   $image_name,
                        'club_state' =>   $request->club_state
                );

                Team::create($form_data); 
                return redirect()->route('admin.teams.index')->with('success','Team created successfully.');
            }
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.teams.index')->with('error', 'Something went wrong');
        }
    }

    public function edit(Team $team)
    {

        return view('admin.teams.edit', compact('team'));
    }

    public function update(UpdateTeamRequest $request, Team $team)
    {
        try {  
            if ($request->isMethod('put')) {

                if($request->hasFile('logoUri')){
                    $image = $request->file('logoUri'); 
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/team-logos'), $image_name);
                } else {
                    $image_name = $team->logoUri;
                }

                $form_data = array(
                        'name'       =>   $request->name,
                        'logoUri'    =>   $image_name,
                        'club_state' =>   $request->club_state
                );

                $team->update($form_data);
                return redirect()->route('admin.teams.index')->with('success','Team updated successfully.');
            }
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.teams.index')->with('error', 'Something went wrong');
        }
    }

    public function show(Team $team)
    {
            // Get number of matches for each player  
            return view('admin.teams.show', compact('team'));
    }

    public function destroy(Team $team)
    {
        $team->delete();
        return back();
    }
}