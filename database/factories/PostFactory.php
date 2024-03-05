<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
            * No es necesario especificar 'id', 'created_at' y 'updated_at' en el factory
            * Laravel maneja internamente estos campos
            * 'id' se genera automáticamente como una clave primaria incremental
            * Los campos 'timestamps' se actualizan automáticamente con la fecha y hora
        */
        return [
           'titulo' => $this->faker->sentence(5),
           'descripcion' => $this->faker->sentence(10), 
           'imagen' => $this->faker->uuid() . '.jpg', 
           'user_id' => $this->faker->randomElement([9, 11])
        ];
    }
}
