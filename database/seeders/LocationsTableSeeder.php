<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new \App\Models\Location;
        $location->plz ="4111";
        $location->city="Walding";
        $location->l_street="Sportzentrum";
        $location->l_number="1";
        $location->description="Sportpark";
        $location->save();

        $location2 = new \App\Models\Location;
        $location2->plz ="4190";
        $location2->city="Bad Leonfelden";
        $location2->l_street="Hagauerstraße";
        $location2->l_number="25";
        $location2->description="Sporty";
        $location2->save();

        $location3 = new \App\Models\Location;
        $location3->plz ="4209";
        $location3->city="Engerwitzdorf";
        $location3->l_street="Gusenbachstraße";
        $location3->l_number="14";
        $location3->description="Spar";
        $location3->save();

        $location4 = new \App\Models\Location;
        $location4->plz ="4020";
        $location4->city="Linz";
        $location4->l_street="Europaplatz";
        $location4->l_number="1";
        $location4->description="Design Center";
        $location4->save();

        /**$vaccination2 = new \App\Models\Vaccination;
        $vaccination2->date ="2030-06-20";
        $vaccination2->time="10:20:00";
        $vaccination2->max_participants="10";

        $location2->vaccinations()->save($vaccination2);**/
    }
}
