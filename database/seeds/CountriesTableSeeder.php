<?php
use App\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run() {
    
            $countries = [[
                'id'         => 1,
                'name'      => 'India',
            ],
            [
                'id'         => 2,
                'name'      => 'Pakistan',
            ],
            [
                'id'         => 3,
                'name'      => 'Afghanistan',
            ],
            [
                'id'         => 4,
                'name'      => 'Australia',
            ],
            [
                'id'         => 5,
                'name'      => 'England',
            ],
            [
                'id'         => 6,
                'name'      => 'Bangladesh',
            ]];

        Country::insert($countries);    
    }
}
