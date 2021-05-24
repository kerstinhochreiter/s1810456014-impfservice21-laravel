<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Str;

class VaccinationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccination = new \App\Models\Vaccination;
        $vaccination->date ="2020-05-27";
        $vaccination->time="22:30:00";
        $vaccination->max_participants="2";

        $location = \App\Models\Location::all()->first();
        $vaccination->location()->associate($location);

        $vaccination->save(); //Befehl, dass es in der DB gespeichert wird


        $vaccination2 = new \App\Models\Vaccination;
        $vaccination2->date ="2020-06-20";
        $vaccination2->time="10:30:00";
        $vaccination2->max_participants="1";

        $location = \App\Models\Location::all()->first();
        $vaccination2->location()->associate($location);

        $vaccination2->save(); //Befehl, dass es in der DB gespeichert wird


    }
}
