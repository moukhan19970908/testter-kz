<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDependency extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_lesson_id',
        'allowed_second_lesson_id'
    ];

    public function firstLesson()
    {
        return $this->belongsTo(Lesson::class, 'first_lesson_id');
    }

    public function allowedSecondLesson()
    {
        return $this->belongsTo(Lesson::class, 'allowed_second_lesson_id');
    }
} 