<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('puede crear una tarea vía API', function () {
    $payload =[
        'title' => 'Implementar Clean Architecture',
        'description' => 'Separar código en Service y Repository'
    ];

    $response = $this->postJson('/api/tasks', $payload);

    // Verificamos respuesta HTTP
    $response->assertStatus(201)
             ->assertJsonFragment(['message' => 'Tarea creada exitosamente']);

    // Verificamos Base de Datos
    $this->assertDatabaseHas('tasks',[
        'title' => 'Implementar Clean Architecture'
    ]);
});

test('no puede crear una tarea sin título', function () {
    $response = $this->postJson('/api/tasks',[]);

    // 422 es el código HTTP estándar para errores de validación
    $response->assertStatus(422)
             ->assertJsonValidationErrors(['title']); 
});