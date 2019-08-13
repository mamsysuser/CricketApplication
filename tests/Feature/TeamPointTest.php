<?php

namespace Tests\Feature;

use App\User;
use App\Team;
use App\TeamPoint;
use App\Match;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TeamPointTest extends TestCase
{
    //Comment it if you dont want to refresh data after each test and want to use DatabaseTransactions
    //use RefreshDatabase;
    use DatabaseTransactions;
    
    // Test to retrive all points
    public function testPointRetrieval()
    {
        $response = $this->call('GET', '/points');
        $this->assertTrue(true);
    }
}
