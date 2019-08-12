<?php
use App\Team;
use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
    
            $teams = [[
                'id'          => 1,
                'name'        => 'India',
                'logoUri'     => 'noimages.jpeg',
                'club_state'  => 'India',
                'created_at'  => '2019-08-12 00:00:00',
                'updated_at'  => '2019-08-12 00:00:00',
            ],[
                'id'          => 2,
                'name'        => 'Pakistan',
                'logoUri'     => 'noimages.jpeg',
                'club_state'  => 'Pakistan',
                'created_at'  => '2019-08-12 00:00:00',
                'updated_at'  => '2019-08-12 00:00:00',
            ],[
                'id'          => 3,
                'name'        => 'Australia',
                'logoUri'     => 'noimages.jpeg',
                'club_state'  => 'Australia',
                'created_at'  => '2019-08-12 00:00:00',
                'updated_at'  => '2019-08-12 00:00:00',
            ],[
                'id'          => 4,
                'name'        => 'Sri Lanka',
                'logoUri'     => 'noimages.jpeg',
                'club_state'  => 'Sri Lanka',
                'created_at'  => '2019-08-12 00:00:00',
                'updated_at'  => '2019-08-12 00:00:00',
            ],[
                'id'          => 5,
                'name'        => 'West Indies',
                'logoUri'     => 'noimages.jpeg',
                'club_state'  => 'West Indies',
                'created_at'  => '2019-08-12 00:00:00',
                'updated_at'  => '2019-08-12 00:00:00',
            ]];

        Team::insert($teams);    
    }
}
