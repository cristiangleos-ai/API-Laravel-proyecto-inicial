<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class StatusController extends Controller
{
    public function check(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'message' => 'API funcionando correctamente',
            'version' => '1.0'
        ]);
    }
}