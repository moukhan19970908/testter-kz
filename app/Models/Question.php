<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'question_text',
        'range',
        'points'
    ];

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public static function getRanges(): array
    {
        return [
            '1-5' => '1-5',
            '6-10' => '6-10',
            '11-15' => '11-15',
            '16-20' => '16-20',
            '21-25' => '21-25',
            '26-30' => '26-30'
        ];
    }

    public static function getPoints(): array
    {
        return [
            1 => '1 балл',
            2 => '2 балла'
        ];
    }
}
