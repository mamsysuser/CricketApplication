<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPlayerRequest;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Player;
use App\Team;
use App\Country;

class PlayersController extends Controller
{
    public function index()
    {
        $players = Player::all();
        return view('admin.players.index', compact('players'));
    }

    public function create()
    {
        $teams = Team::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        return view('admin.players.create', compact('teams','countries'));
    }

    public function store(StorePlayerRequest $request)
    {
        try { 
            if ($request->isMethod('post')) {

                if($request->hasFile('imageUri')){
                    $image = $request->file('imageUri'); 
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/player-logos'), $image_name);
                }
                
                //Serialization for player history
                $history_data = array(
                    'matches'   => $request->matches,
                    'runs'      => $request->runs,
                    'highest_score' => $request->highest_score,
                    'hundreds'      => $request->hundreds,
                    'fifties'       => $request->fifties,
                    'wickets'       => $request->wickets    
                );

                $serialized_history_date = serialize($history_data);

                //Save player information
                $player = new Player();
                $player->firstName = $request->firstName;
                $player->lastName  = $request->lastName;
                $player->team_id   = $request->team_id;
                $player->jerseyNo  = $request->jerseyNo;
                $player->imageUri  = $image_name;
                $player->country_id= $request->country_id;
                $player->player_history = $serialized_history_date;
                $player->save();

                return redirect()->route('admin.players.index')->with('success','Player created successfully.');
            }
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.players.index')->with('error', 'Something went wrong');
        }
    }

    public function edit(Player $player)
    {
        $teams = Team::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');

        $player_history_data = unserialize($player->player_history);
         
        return view('admin.players.edit', compact('player','playerhistory', 'teams', 'countries', 'player_history_data'));
    }

    public function update(UpdatePlayerRequest $request, Player $player)
    {

        try {
            if ($request->isMethod('put')) {

                if($request->hasFile('imageUri')){
                    $image = $request->file('imageUri'); 
                    $image_name = rand() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('images/player-logos'), $image_name);
                } else {
                    $image_name = $player->imageUri;
                }
                
                //Serialization for player history
                $history_data = array(
                    'matches'   => $request->matches,
                    'runs'      => $request->runs,
                    'highest_score' => $request->highest_score,
                    'hundreds'      => $request->hundreds,
                    'fifties'       => $request->fifties,
                    'wickets'       => $request->wickets    
                );

                $serialized_history_date = serialize($history_data);

                $form_data = array(
                        'firstName'  =>   $request->firstName,
                        'lastName'   =>   $request->lastName,
                        'team_id'     =>  $request->team_id,
                        'jerseyNo'   =>   $request->jerseyNo,
                        'imageUri'    =>  $image_name,
                        'country_id'  =>  $request->country_id,
                        'player_history' => $serialized_history_date
                );

                $player->update($form_data);

                return redirect()->route('admin.players.index')->with('success','Player updated successfully.');
            }
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.players.index')->with('error', 'Something went wrong');
        }
    }

    public function show(Player $player)
    {
        return view('admin.players.show', compact('player'));
    }

    public function destroy(Player $player)
    {
        $player->delete();
        return redirect()->route('admin.players.index')->with('success','Player deleted successfully.');
    }
}