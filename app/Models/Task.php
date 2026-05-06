<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // Equivalente a decirle a JPA qué campos mapear en un guardado masivo
    protected $fillable = [
        'title',
        'description',
        'is_completed',
    ];

    // Casteos: Le dice a PHP qué tipo de dato debe retornar
    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }
}