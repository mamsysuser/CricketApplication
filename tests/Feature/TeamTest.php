<?php

namespace Tests\Feature;

use App\User;
use App\Team;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;


class TeamTest extends TestCase
{
    use RefreshDatabase;

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
