<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lesson;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'name' => 'Математикалық сауаттылық',
            'type' => 'required',
        ]);
        Lesson::create([
            'name' => 'Оқу сауаттылық',
            'type' => 'required',
        ]);
        Lesson::create([
            'name' => 'Қазақстан тарихы',
            'type' => 'required',
        ]);
        Lesson::create([
            'name' => 'Математика',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Физика',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Химия',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Биология',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'География',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Информатика',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Ағылшын тілі',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Дүние жүзі тарихы',
            'type' => 'optional',
        ]);
        Lesson::create([
            'name' => 'Құқық негіздері',
            'type' => 'optional',
        ]);
    }
}
