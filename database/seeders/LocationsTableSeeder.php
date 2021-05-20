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
        $location->plz ="4183";
        $location->city="Traberg";
        $location->l_street="Unterwaldschlag";
        $location->l_number="29";
        $location->description="Teichtheisl";
        $location->save();

        $location2 = new \App\Models\Location;
        $location2->plz ="4120";
        $location2->city="Linz";
        $location2->l_street="Gruberstraße";
        $location2->l_number="2";
        $location2->description="Lederfabrik";
        $location2->save();

        $vaccination2 = new \App\Models\Vaccination;
        $vaccination2->date ="2030-06-20";
        $vaccination2->time="10:20:00";
        $vaccination2->max_participants="10";

        $location2->vaccinations()->save($vaccination2);
    }
}
