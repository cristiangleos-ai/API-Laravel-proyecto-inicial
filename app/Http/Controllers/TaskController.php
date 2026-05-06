<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\TaskService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct(
        private readonly TaskService $taskService
    ) {}

    public function store(Request $request): JsonResponse
    {
        // 1. Validar la petición (En Laravel usamos $request->validate)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // 2. Ejecutar la lógica en el Servicio
        $task = $this->taskService->createTask($validatedData);

        // 3. Retornar respuesta
        return response()->json([
            'message' => 'Tarea creada exitosamente',
            'data' => $task
        ], 201);
    }
}