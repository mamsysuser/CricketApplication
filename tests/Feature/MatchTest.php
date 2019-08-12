<?php

namespace Tests\Feature;

use App\User;
use App\Match;
use App\Team;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

class MatchTest extends TestCase
{
    use RefreshDatabase;

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
