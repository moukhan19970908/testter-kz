<?php

namespace App\MoonShine\Resources;

use App\Models\Question;
use App\Models\Lesson;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Select;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Textarea;
use MoonShine\UI\Fields\HasMany;
use MoonShine\UI\Fields\Checkbox;

class QuestionResource extends ModelResource
{
    protected string $model = Question::class;
    protected string $title = 'Вопросы';
    protected string $column = 'question_text';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Вопрос', 'question_text')->required(),
            Select::make('Предмет', 'lesson_id')
                ->options(Lesson::all()->pluck('name', 'id')->toArray())
                ->required(),
            Select::make('Диапазон', 'range')
                ->options([
                    '1-5' => '1-5',
                    '6-10' => '6-10',
                    '11-15' => '11-15',
                    '16-20' => '16-20',
                    '21-25' => '21-25',
                    '26-30' => '26-30',
                ])
                ->required(),
            Number::make('Баллы', 'points')->default(1),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Вопрос', 'question_text')->sortable(),
            Select::make('Предмет', 'lesson_id')
                ->options(Lesson::all()->pluck('name', 'id')->toArray())
                ->sortable(),
            Select::make('Диапазон', 'range')->sortable(),
            Number::make('Баллы', 'points')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Select::make('Предмет', 'lesson_id')
                ->options(Lesson::all()->pluck('name', 'id')->toArray())
                ->required()
                ->placeholder('Выберите предмет'),
            Textarea::make('Вопрос', 'question_text')
                ->required()
                ->placeholder('Введите текст вопроса')
                ->customAttributes(['rows' => 3]),
            Select::make('Диапазон', 'range')
                ->options([
                    '1-5' => '1-5',
                    '6-10' => '6-10',
                    '11-15' => '11-15',
                    '16-20' => '16-20',
                    '21-25' => '21-25',
                    '26-30' => '26-30',
                ])
                ->required()
                ->placeholder('Выберите диапазон'),
            Number::make('Баллы', 'points')
                ->default(1)
                ->min(1)
                ->max(10),
            
            
            // Поле для добавления ответов
            Textarea::make('Ответ 1', 'answer_1')
                ->placeholder('Введите первый вариант ответа'),
            Checkbox::make('Правильный', 'correct_1'),
                
            Textarea::make('Ответ 2', 'answer_2')->placeholder('Введите второй вариант ответа'),
            Checkbox::make('Правильный', 'correct_2'),
                
            Textarea::make('Ответ 3', 'answer_3')
                ->placeholder('Введите третий вариант ответа'),
            Checkbox::make('Правильный', 'correct_3'),
                
            Textarea::make('Ответ 4', 'answer_4')
                ->placeholder('Введите четвертый вариант ответа'),
            Checkbox::make('Правильный', 'correct_4'),
        ];
    }

    // Метод для сохранения вопроса и ответов
    public function onSave($item): void
    {
        parent::onSave($item);
        
        // Сохраняем ответы после создания вопроса
        $answers = [];
        
        for ($i = 1; $i <= 4; $i++) {
            $answerText = request("answer_{$i}");
            $isCorrect = request("correct_{$i}");
            
            if (!empty($answerText)) {
                $answers[] = [
                    'question_id' => $item->id,
                    'answer_text' => $answerText,
                    'is_correct' => $isCorrect ? true : false,
                ];
            }
        }
        
        if (!empty($answers)) {
            \App\Models\Answer::insert($answers);
        }
    }
} 