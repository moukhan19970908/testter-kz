<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Lesson $lesson)
    {
        $questions = $lesson->questions()->with('answers')->paginate(10);
        return view('admin.questions.index', compact('lesson', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Lesson $lesson)
    {
        $ranges = Question::getRanges();
        $points = Question::getPoints();
        return view('admin.questions.create', compact('lesson', 'ranges', 'points'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Lesson $lesson)
    {
        $request->validate([
            'question_text' => 'required|string',
            'range' => 'required|string|in:' . implode(',', array_keys(Question::getRanges())),
            'points' => 'required|integer|in:1,2',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer'
        ]);

        DB::transaction(function () use ($request, $lesson) {
            $question = $lesson->questions()->create([
                'question_text' => $request->question_text,
                'range' => $request->range,
                'points' => $request->points
            ]);

            foreach ($request->answers as $key => $answerText) {
                $question->answers()->create([
                    'answer_text' => $answerText,
                    'is_correct' => in_array($key, $request->correct_answers)
                ]);
            }
        });

        return redirect()->route('admin.lessons.questions.index', $lesson)
            ->with('success', 'Вопрос успешно создан');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson, Question $question)
    {
        $ranges = Question::getRanges();
        $points = Question::getPoints();
        return view('admin.questions.edit', compact('lesson', 'question', 'ranges', 'points'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson, Question $question)
    {
        $request->validate([
            'question_text' => 'required|string',
            'range' => 'required|string|in:' . implode(',', array_keys(Question::getRanges())),
            'points' => 'required|integer|in:1,2',
            'answers' => 'required|array|min:2',
            'answers.*' => 'required|string',
            'correct_answers' => 'required|array|min:1',
            'correct_answers.*' => 'required|integer'
        ]);

        DB::transaction(function () use ($request, $question) {
            $question->update([
                'question_text' => $request->question_text,
                'range' => $request->range,
                'points' => $request->points
            ]);

            // Удаляем старые ответы
            $question->answers()->delete();

            // Создаем новые ответы
            foreach ($request->answers as $key => $answerText) {
                $question->answers()->create([
                    'answer_text' => $answerText,
                    'is_correct' => in_array($key, $request->correct_answers)
                ]);
            }
        });

        return redirect()->route('admin.lessons.questions.index', $lesson)
            ->with('success', 'Вопрос успешно обновлен');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson, Question $question)
    {
        $question->delete();

        return redirect()->route('admin.lessons.questions.index', $lesson)
            ->with('success', 'Вопрос успешно удален');
    }
}
