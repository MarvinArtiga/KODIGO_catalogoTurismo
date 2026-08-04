<?php

use App\Models\Lugar;

beforeEach(function () {
    Lugar::factory()->createMany([
        [
            'titulo' => 'Volcán de Santa Ana',
            'departamento' => 'Santa Ana',
            'categoria' => 'Aventura',
            'precio' => 20.00,
            'descripcion' => 'Ascenso al volcán con vista al lago.',
            'ubicacion' => 'Volcán de Santa Ana, Santa Ana',
            'horario' => '8:00 - 18:00',
            'imagen' => 'https://images.unsplash.com/photo-1516910817561-6f96b5fd31db?auto=format&fit=crop&w=1200&q=80',
        ],
        [
            'titulo' => 'Ruta de las Flores',
            'departamento' => 'Ahuachapán',
            'categoria' => 'Turismo cultural',
            'precio' => 12.50,
            'descripcion' => 'Pueblos pintorescos y café de montaña.',
            'ubicacion' => 'Ruta de las Flores, Ahuachapán',
            'horario' => '9:00 - 17:00',
            'imagen' => 'https://images.unsplash.com/photo-1526778548025-fa2f459cd5c1?auto=format&fit=crop&w=1200&q=80',
        ],
    ]);
});

test('la página principal muestra los lugares turísticos', function () {
    $response = $this->get(route('home'));

    $response->assertOk();
    $response->assertSee('Catálogo de lugares turísticos');
    $response->assertSee('Volcán de Santa Ana');
    $response->assertSee('Ruta de las Flores');
});

test('la página de detalles muestra la información completa del lugar', function () {
    $lugar = Lugar::first();

    $response = $this->get(route('lugares.show', $lugar));

    $response->assertOk();
    $response->assertSee($lugar->titulo);
    $response->assertSee($lugar->departamento);
    $response->assertSee($lugar->categoria);
    $response->assertSee((string) number_format($lugar->precio, 2));
    $response->assertSee($lugar->ubicacion);
    $response->assertSee($lugar->horario);
});

test('el formulario de contacto valida los datos obligatorios', function () {
    $response = $this->post(route('contacto.store'), [
        'nombre' => '',
        'correo' => 'no-valido',
        'telefono' => 'abc123',
        'mensaje' => '',
    ]);

    $response->assertSessionHasErrors(['nombre', 'correo', 'telefono', 'mensaje']);
});

test('el formulario de contacto puede enviar un mensaje válido', function () {
    $response = $this->post(route('contacto.store'), [
        'nombre' => 'Juan Pérez',
        'correo' => 'juan@ejemplo.com',
        'telefono' => '12345678',
        'mensaje' => 'Me interesa visitar estos lugares.',
    ]);

    $response->assertRedirect(route('contacto.create'));
    $this->assertDatabaseHas('contactos', [
        'nombre' => 'Juan Pérez',
        'correo' => 'juan@ejemplo.com',
        'telefono' => '12345678',
        'mensaje' => 'Me interesa visitar estos lugares.',
    ]);
});
