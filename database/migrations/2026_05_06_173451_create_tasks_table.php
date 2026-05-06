<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {   
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Llave primaria autoincremental
            $table->string('title'); // Varchar(255)
            $table->text('description')->nullable(); // Texto largo, permite nulos
            $table->boolean('is_completed')->default(false); // Booleano
            $table->timestamps(); // Crea automáticamente 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
