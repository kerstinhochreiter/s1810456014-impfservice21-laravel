<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //führt dazu dass der Seeder aufgerufen wird mit php artisan db:seed
        $this->call(LocationsTableSeeder::class);
        $this->call(VaccinationsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
