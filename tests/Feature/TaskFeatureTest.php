<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/*
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


*/
test('un usuario no autenticado recibe error 401 al crear tarea', function () {
    $response = $this->postJson('/api/tasks',['title' => 'Hackear API']);
    
    $response->assertStatus(401); // 401 Unauthorized
});

test('un usuario autenticado puede crear una tarea', function () {
    // 1. Creamos un usuario de prueba (usando el Factory que Laravel trae por defecto)
    $user = User::factory()->create();

    $payload =[
        'title' => 'Implementar Seguridad JWT',
        'description' => 'Aprender middlewares'
    ];

    // 2. Usamos actingAs para simular que enviamos un token JWT válido
    $response = $this->actingAs($user, 'api')->postJson('/api/tasks', $payload);

    $response->assertStatus(201)
             ->assertJsonFragment(['message' => 'Tarea creada exitosamente']);
});