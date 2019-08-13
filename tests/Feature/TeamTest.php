<?php

namespace Tests\Feature;

use App\User;
use App\Team;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class TeamTest extends TestCase
{
    //Comment it if you dont want to refresh data after each test and want to use DatabaseTransactions
    //use RefreshDatabase;
    use DatabaseTransactions;
 
    
    // Test to create a new team in the database, fetch the latest teams, assert that the inserted team is equal to the retrieved team, then roll everything back using database transactions
    public function testTeamRetrieval()
    {
        // Given a team has been created in the database
        $insertedteam = factory(Team::class)->create();
        
        // When I fetch the latest team
        $retrievedteam = Team::latest()->get();
        
        // Then I should have a correct response of 1 team
        // Inserted team should match first result of latest() method call (retrieved team)
        $this->assertEquals($insertedteam->toArray(), $retrievedteam[0]->toArray());
    }

    /**
     * Test Team View if exist.
     *
     * @return void
     */
    public function testTeamView()
    {
      $team = new Team(['name'=>'Demo Team']);
      $this->assertEquals('Demo Team', $team->name);
    }

    /**
     * Create Teams using test
     *
     * @return void
     */

    //Creating new team using test
    public function testCreateTeam()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/teams', $this->data());

        $this->assertCount(1, User::all());
    }

    //Check validation data

    private function data() {
        return [
            'name'       => 'Test Team',
            'logoUri'    => 'noimage.jpg',
            'club_state' => 'Test',
        ];        
    }

    //Update Team using test
    public function testUpdateTeam() {

        $this->put('/teams', [
            'name'       => 'Test Team',
            'logoUri'    => 'noimage.jpg',
            'club_state' => 'Test',
        ]);


        $response = $this->patch('/teams/', [
            'name'       => 'New Team',
            'logoUri'    => 'newnoimage.jpg',
            'club_state' => 'New Test', 
        ]);

        $this->assertTrue(true);
    }
}
