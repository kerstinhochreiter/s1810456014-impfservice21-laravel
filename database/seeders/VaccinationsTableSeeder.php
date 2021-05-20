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
        $vaccination->max_participants="5";
        $vaccination->save(); //Befehl, dass es in der DB gespeichert wird
    }
}
