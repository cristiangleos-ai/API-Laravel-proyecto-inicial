<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskService
{
    // Inyección de dependencias moderna en PHP 8
    public function __construct(
        private readonly TaskRepositoryInterface $taskRepository
    ) {}

    public function createTask(array $data): Task
    {
        // Aquí irían las reglas de negocio complejas antes de guardar
        // Por ahora, solo pasamos la data al repositorio
        return $this->taskRepository->create($data);
    }
}