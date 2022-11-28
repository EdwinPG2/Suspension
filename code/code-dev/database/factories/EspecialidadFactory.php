<?php

namespace Database\Factories;

use App\Models\Especialidad;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecialidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Especialidad::class;

    public function definition()
    {
        return [
            'Id_especialidad' => "Especialidad {$this->faker->Id_especialidad}",
            'Nombre_especialidad' => "Especialidad {$this->faker->Nombre_especialidad}",
            'Descripcion' => "Especialidad {$this->faker->Descripcion}",
        ];
    }
}
