<?php

namespace Database\Factories;

use App\Models\Lugar;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lugar>
 */
class LugarFactory extends Factory
{
    protected $model = Lugar::class;

    public function definition(): array
    {
        $lugares = [
            [
                'titulo' => 'Volcán de Santa Ana',
                'departamento' => 'Santa Ana',
                'categoria' => 'Aventura',
                'descripcion' => 'Ascenso panorámico por senderos volcánicos con vista al lago de Coatepeque.',
                'ubicacion' => 'Parque Nacional Cerro Verde, Santa Ana',
                'horario' => '7:00 - 18:00',
                'imagen' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'titulo' => 'Ruta de las Flores',
                'departamento' => 'Ahuachapán',
                'categoria' => 'Cultural',
                'descripcion' => 'Recorrido por pueblos llenos de flores, cafés de altura y mercados artesanales.',
                'ubicacion' => 'Ahuachapán',
                'horario' => '9:00 - 17:00',
                'imagen' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'titulo' => 'Lago de Coatepeque',
                'departamento' => 'Santa Ana',
                'categoria' => 'Naturaleza',
                'descripcion' => 'Disfruta paseos en bote, restaurantes frente al lago y atardeceres espectaculares.',
                'ubicacion' => 'Lago de Coatepeque, Santa Ana',
                'horario' => '8:00 - 19:00',
                'imagen' => 'https://images.unsplash.com/photo-1500534314209-a25ddb2bd429?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'titulo' => 'Playa El Cuco',
                'departamento' => 'La Libertad',
                'categoria' => 'Playa',
                'descripcion' => 'Surf, arena dorada y un ambiente relajado ideal para familias y grupos.',
                'ubicacion' => 'El Cuco, La Libertad',
                'horario' => '6:00 - 18:00',
                'imagen' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80',
            ],
            [
                'titulo' => 'Suchitoto Colonial',
                'departamento' => 'Cuscatlán',
                'categoria' => 'Histórico',
                'descripcion' => 'Caminatas por calles empedradas, galerías de arte y cultura local en cada esquina.',
                'ubicacion' => 'Suchitoto, Cuscatlán',
                'horario' => '9:00 - 18:00',
                'imagen' => 'https://images.unsplash.com/photo-1483683804023-6ccdb62f86ef?auto=format&fit=crop&w=1200&q=80',
            ],
        ];

        $lugar = fake()->randomElement($lugares);

        return [
            'titulo' => $lugar['titulo'],
            'departamento' => $lugar['departamento'],
            'categoria' => $lugar['categoria'],
            'precio' => fake()->randomFloat(2, 10, 40),
            'descripcion' => $lugar['descripcion'],
            'ubicacion' => $lugar['ubicacion'],
            'horario' => $lugar['horario'],
            'imagen' => $lugar['imagen'],
        ];
    }
}
