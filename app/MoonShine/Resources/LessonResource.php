<?php

namespace App\MoonShine\Resources;

use App\Models\Lesson;
use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;

class LessonResource extends ModelResource
{
    protected string $model = Lesson::class;
    protected string $title = 'Предметы';
    protected string $column = 'name';

    public function fields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->required(),
        ];
    }

    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'name')->sortable(),
        ];
    }

    public function formFields(): array
    {
        return [
            Text::make('Название', 'name')
                ->required()
                ->placeholder('Введите название предмета'),
        ];
    }
}
