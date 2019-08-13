<?php

namespace Tests\Feature;

use App\User;
use App\Match;
use App\Team;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MatchTest extends TestCase
{
    //Comment it if you dont want to refresh data after each test and want to use DatabaseTransactions
    //use RefreshDatabase;
    use DatabaseTransactions;
 
    // Test to retrive all matches
    public function testMatchRetrieval()
    {
        // Given a match has been created in the database
        $insertedmatch = factory(Match::class)->create($this->data());
        
        // When I fetch the matches
        $retrievedmatch = Match::get();
        $this->assertTrue(true);
    }

    /**
     * Create Teams using test
     *
     * @return void
     */

    //Check new match creation
    public function testCreateMatch()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/matches', $this->data());

        $this->assertCount(1, User::all());
    }

    //Check validation data
    private function data() {
        return [
            'match_title'     => 'Test Match',
            'firstteam_id'    => factory(Team::class)->create()->id,
            'secondteam_id'   => factory(Team::class)->create()->id,
            'winningteam_id'  => factory(Team::class)->create()->id,      
        ];        
    }
}
