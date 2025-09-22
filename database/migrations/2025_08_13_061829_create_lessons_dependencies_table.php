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
        Schema::create('lessons_dependencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('first_lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->foreignId('allowed_second_lesson_id')->constrained('lessons')->onDelete('cascade');
            $table->timestamps();
            
            // Уникальная комбинация первого предмета и доступного второго
            $table->unique(['first_lesson_id', 'allowed_second_lesson_id'], 'lessons_dep_first_second_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons_dependencies');
    }
};
