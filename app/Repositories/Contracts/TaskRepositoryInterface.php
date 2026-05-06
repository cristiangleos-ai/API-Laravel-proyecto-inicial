<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Models\Task;

interface TaskRepositoryInterface
{
    public function create(array $data): Task;
}