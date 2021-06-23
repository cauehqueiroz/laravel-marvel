<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class ExampleTest extends TestCase
{
    use WithFaker;


    /**
     * Tests the API characters list
     */
    public function test_characters_list()
    {
        $response = $this->get('v1/public/characters/');

        $response->assertStatus(200);
    }

    /**
     * Tests the API characters insert and update
     */
    public function test_characters_insert()
    {
        $response = $this->json(
            'POST',
            'v1/public/character',
            [
                'name' => $this->faker->name,
                'description' => $this->faker->text,
            ]
        );
        $response->assertStatus(200);

    }
}
