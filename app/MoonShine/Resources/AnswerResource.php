<?php

namespace App\MoonShine\Resources;

use App\Models\Answer;
use App\Models\Question;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\Fields\ID;
use MoonShine\Fields\Text;
use MoonShine\Fields\Select;
use MoonShine\Fields\Checkbox;
use MoonShine\Fields\Textarea;

class AnswerResource extends ModelResource
{
    protected string $model = Answer::class;
    protected string $title = 'Ответы';
    protected string $column = 'answer_text';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Ответ', 'answer_text')->required(),
            Select::make('Вопрос', 'question_id')
                ->options(Question::with('lesson')->get()->pluck('question_text', 'id')->toArray())
                ->required(),
            Checkbox::make('Правильный ответ', 'is_correct'),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Ответ', 'answer_text')->sortable(),
            Select::make('Вопрос', 'question_id')
                ->options(Question::with('lesson')->get()->pluck('question_text', 'id')->toArray())
                ->sortable(),
            Checkbox::make('Правильный', 'is_correct')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Select::make('Вопрос', 'question_id')
                ->options(Question::with('lesson')->get()->pluck('question_text', 'id')->toArray())
                ->required()
                ->placeholder('Выберите вопрос'),
            Textarea::make('Ответ', 'answer_text')
                ->required()
                ->placeholder('Введите текст ответа')
                ->rows(2),
            Checkbox::make('Правильный ответ', 'is_correct')
                ->default(false),
        ];
    }
} 