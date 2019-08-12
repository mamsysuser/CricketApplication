<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Team;
use App\Match;
use App\TeamPoints;

class FixturesController extends Controller
{

	/**
     * Auxiliar array
     * @var array 
     */
    private $aux = array();
    
    /**
     * Array to pairs rounds
     * @var Array
     */
    private $pair = array();
    
    /**
     * Array to odds rounds
     * @var Array  
     */
    private $odd = array();
    
    /**
     * Counter or number of games
     * @var int 
     */
    private $countGames = 0;
    
    /**
     * Counter of number of teams
     * @var int
     */
    private $countTeams = 0;
  
    /**
     * It make the starting round
     * @return Array Array with the matches of te round one or pair round
     */
    private function init(){
        for($x = 0; $x < $this->countGames; $x++){
            $this->pair[$x][0] = $this->aux[$x];
            $this->pair[$x][1] = $this->aux[($this->countTeams - 1) - $x];
        }
        return $this->pair;
    }

    /**
     * Returns the schedule generated
     * @return Array Array with the full matches created
     */
    public function getSchedule(){
        $rol = array();
        $rol[] = $this->init();
        for($y = 1; $y < $this->countTeams-1; $y++){
            if($y % 2 == 0){
                $rol[] = $this->getPairRound();
            }else{
                $rol[] = $this->getOddRound();
            }
        }
        return $rol;
    }
    
    /**
     * Create the matches of a pair round
     * @return Array Array with the matches created
     */
    private function getPairRound(){
        for($z = 0; $z < $this->countGames; $z++){
            if($z == 0){
                $this->pair[$z][0] = $this->odd[$z][0];
                $this->pair[$z][1] = $this->odd[$z + 1][0];
            }elseif($z == $this->countGames-1){
                $this->pair[$z][0] = $this->odd[0][1];
                $this->pair[$z][1] = $this->odd[$z][1];
            }else{
                $this->pair[$z][0] = $this->odd[$z][1];
                $this->pair[$z][1] = $this->odd[$z + 1][0];
            }
        }
        return $this->pair;
    }
    
    /**
     * Create the matches of a odd round
     * @return Array Array with the matches created
     */
    private function getOddRound(){
        for($j = 0; $j < $this->countGames; $j++){
            if($j == 0){
                $this->odd[$j][0] = $this->pair[$j][1];
                $this->odd[$j][1] = $this->pair[$this->countGames - 1][0]; //Pivot
            }else{
                $this->odd[$j][0] = $this->pair[$j][1];
                $this->odd[$j][1] = $this->pair[$j - 1][0];
            }
        }
        return $this->odd;
    }

    public function show()
    {
    	//Pairing between number of teams
        try {
            $teams = Team::pluck('id');
    		
    		if(count($teams)<2) {
    		  return redirect()->route('admin.matches.index')->with('info','Sorry! System does not have sufficient teams to create Fixtures. Please create at least 2 teams to continue.');
    		}

    		$teams = $teams->toArray();

    		if(is_array($teams)){
                shuffle($teams);
                $this->countTeams = count($teams);
                if($this->countTeams % 2 == 1){
                    $this->countTeams++;
                    $teams[] = "null";
                } 
                $this->countGames = floor($this->countTeams/2);
                for($i = 0; $i < $this->countTeams; $i++){
                    $this->aux[] = $teams[$i];
                }
            }else{
                return false;
            }

    		$schedule = $this->getSchedule();
    		//show the rounds
    		$i = 1;
    		foreach($schedule as $rounds){
    		    //echo "<h3>Round {$i}</h3>";
    		    foreach($rounds as $game){
    		        //echo "{$game[0]} vs {$game[1]}<br>";
    		      if($game[0]!='null' && $game[1]!='null') {
                    $first_pair_exist_records = Match::where('firstteam_id',$game[0])->where('secondteam_id',$game[1])->first();

                    $second_pair_exist_records = Match::where('secondteam_id',$game[0])->where('firstteam_id',$game[1])->first();

                    if (is_null($first_pair_exist_records) && is_null($second_pair_exist_records)) {
                    	
                        $data = array(
    					    array('match_title'=> "Match ", 'firstteam_id'=> $game[0], 'secondteam_id'=>$game[1])
    					);
    					
                        $match = new Match();
                        $match->match_title = 'Match';
                        $match->firstteam_id = $game[0];
                        $match->secondteam_id =$game[1];
                        $match->save();
                        
                        //Getting Last inserted id
                        $insertedId = $match->id;
                        
                        $point_data = array(
                            array('match_id'=> $insertedId, 'points'=>'0')
                        );

                        TeamPoints::insert($point_data);
                    } else {  
    			      	return redirect()->route('admin.matches.index')->with('info','Sorry! System has already created best possible Fixtures.');
    			    }
    		      }
    		    }
    		    $i++;
            }
            return redirect()->route('admin.matches.index')->with('success','Random Match fixtures created successfully based on permutations and combinations.');
        }

        catch(\Exception $e)
        {
            return redirect()->route('admin.matches.index')->with('error', 'Something went wrong');
        }
    }
}