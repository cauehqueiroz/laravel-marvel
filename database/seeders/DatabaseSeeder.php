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
        $comics = \App\Models\Comic::factory(10)->create();
        $characters = \App\Models\Character::factory(10)->create()->each(function($character){
            \App\Models\CharacterComic::factory(1)->create([
                'character_id' => $character->id,
                'comic_id' => rand(1,10)
            ]);
        });
    }
}
