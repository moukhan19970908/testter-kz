<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    // Связи с зависимостями
    public function firstDependencies()
    {
        return $this->hasMany(LessonDependency::class, 'first_lesson_id');
    }

    public function allowedSecondDependencies()
    {
        return $this->hasMany(LessonDependency::class, 'allowed_second_lesson_id');
    }

    // Получить все доступные вторые предметы для данного предмета
    public function getAvailableSecondLessons()
    {
        return $this->firstDependencies()
            ->with('allowedSecondLesson')
            ->get()
            ->map(function ($dependency) {
                return [
                    'id' => $dependency->allowed_second_lesson_id,
                    'name' => $dependency->allowedSecondLesson->name,
                    'combination' => $this->name . ' - ' . $dependency->allowedSecondLesson->name
                ];
            });
    }

    // Статические методы для получения предметов по типу
    public static function getRequired()
    {
        return static::where('type', 'required')->get();
    }

    public static function getOptional()
    {
        return static::where('type', 'optional')->get();
    }
}
