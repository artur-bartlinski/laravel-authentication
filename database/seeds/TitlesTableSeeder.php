<?php

use Illuminate\Database\Seeder;

class TitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Title::class)->create(['name' => 'Mr'])->each(function ($u) {
        });

        factory(App\Title::class)->create(['name' => 'Miss'])->each(function ($u) {
        });

        factory(App\Title::class)->create(['name' => 'Mrs'])->each(function ($u) {
        });

        factory(App\Title::class)->create(['name' => 'Dr'])->each(function ($u) {
        });
    }
}
