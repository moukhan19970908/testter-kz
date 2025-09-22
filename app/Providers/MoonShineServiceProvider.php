<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MoonShine\Contracts\Core\DependencyInjection\ConfiguratorContract;
use MoonShine\Contracts\Core\DependencyInjection\CoreContract;
use MoonShine\Laravel\DependencyInjection\MoonShine;
use MoonShine\Laravel\DependencyInjection\MoonShineConfigurator;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use App\MoonShine\Resources\LessonResource;
use MoonShine\MenuManager\MenuItem;
use App\MoonShine\Resources\QuestionResource;
use App\MoonShine\Resources\AnswerResource;

class MoonShineServiceProvider extends ServiceProvider
{
    /**
     * @param  MoonShine  $core
     * @param  MoonShineConfigurator  $config
     *
     */
    public function boot(CoreContract $core, ConfiguratorContract $config): void
    {
        $core
            ->resources([
                MoonShineUserResource::class,
                MoonShineUserRoleResource::class,
                LessonResource::class, // Добавлен ресурс предметов,
                QuestionResource::class, // Добавлен ресурс вопросов
                AnswerResource::class, // Добавлен ресурс ответов
            ]);

    }

    protected function menu():array
    {
        return [
            MenuItem::make('Уроки',LessonResource::class),
        ];
    }
}
