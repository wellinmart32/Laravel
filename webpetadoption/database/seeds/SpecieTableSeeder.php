<?php

use Illuminate\Database\Seeder;
use App\Specie;

class SpecieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specie = new Specie();
        $specie->name = 'Perro';
        $specie->access_url = 'dogGraph';
        $specie->save();

        $specie = new Specie();
        $specie->name = 'Gato';
        $specie->access_url = 'catGraph';
        $specie->save();

        $specie = new Specie();
        $specie->name = 'Canario';
        $specie->access_url = 'canaryGraph';
        $specie->save();

        $specie = new Specie();
        $specie->name = 'Hamster';
        $specie->access_url = 'hamsterGraph';
        $specie->save();
    }
}
