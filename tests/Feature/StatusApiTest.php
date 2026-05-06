<?php

declare(strict_types=1);

test('el endpoint de status devuelve un json exitoso', function () {
    // 1. Act (Actuar): Hacemos una petición GET a la ruta
    $response = $this->getJson('/api/status');

    // 2. Assert (Afirmar): Comprobamos que el status HTTP sea 200 y la estructura del JSON
    $response->assertStatus(200)
        ->assertExactJson([
            'success' => true,
            'message' => 'API funcionando correctamente',
            'version' => '1.0',
        ]);
});