<?php

namespace Tests\Feature;

use App\User;
use App\Player;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class PlayerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create Teams using test
     *
     * @return void
     */
    public function testCreatePlayer()
    {
        Event::fake();

        $this->actingAs(factory(User::class)->create());
        $response = $this->post('/players', $this->data());

        $this->assertCount(1, User::all());
    }

    //Check validation data

    private function data() {
        return [
            'firstName'       => 'Test Name',
            'lastName'        => 'Test Last Name',
            'imageUri'        => 'noimage.jpg',
            'jerseyNo'        => '1',
            'country_id'      => '1',
            'team_id'         => '1',
            'player_history'  => 'a:6:{s:7:"matches";s:2:"22";s:4:"runs";s:4:"2222";s:13:"highest_score";s:2:"22";s:8:"hundreds";s:2:"22";s:7:"fifties";s:2:"22";s:7:"wickets";s:2:"22";}',         
        ];        
    }
}
