<?php

declare(strict_types=1);

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

// RefreshDatabase es CLAVE: Borra la base de datos después de cada prueba 
// para que siempre tengas un entorno limpio, igual que en las pruebas de Java.
uses(RefreshDatabase::class);

test('puede crear una tarea en la base de datos', function () {
    // 1. Act: Creamos la tarea usando el ORM
    $task = Task::create([
        'title' => 'Aprender Eloquent',
        'description' => 'Mapear base de datos en Laravel',
    ]);

    // 2. Assert: Comprobamos que el objeto se creó
    expect($task->id)->toBeNumeric();
    expect($task->title)->toBe('Aprender Eloquent');

    // 3. Assert DB: Comprobamos que REALMENTE existe en la tabla de MySQL
    $this->assertDatabaseHas('tasks', [
        'title' => 'Aprender Eloquent',
        'is_completed' => false, // Verificamos que el valor por defecto funcionó
    ]);
});
