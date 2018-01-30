<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Gender::class)->create(['name' => 'Male'])->each(function ($u) {
        });

        factory(App\Gender::class)->create(['name' => 'Female'])->each(function ($u) {
        });
    }
}
