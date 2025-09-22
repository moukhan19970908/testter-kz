<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return view('welcome', compact('lessons'));
    }

    public function generateQuestions($lesson_id)
    {
        // Get 5 random questions from range 1-5
        $questionsFirstRange = Question::where('lesson_id', $lesson_id)
            ->where('range', '1-5')
            ->inRandomOrder()
            ->limit(5)
            ->with('answers')
            ->get();

        // Get 5 random questions from range 6-10
        $questionsSecondRange = Question::where('lesson_id', $lesson_id)
            ->where('range', '6-10')
            ->inRandomOrder()
            ->limit(5)
            ->with('answers')
            ->get();

        // Combine both collections
        $questions = $questionsFirstRange->concat($questionsSecondRange);

        // Если нет вопросов, показываем сообщение
        if ($questions->isEmpty()) {
            return redirect()->back()->with('error', 'Для выбранного предмета пока нет вопросов. Попробуйте другой предмет.');
        }

        return view('questions', compact('questions'));
    }

    public function submitAnswers(Request $request)
    {
        $submittedAnswers = $request->input('answers', []);
        $totalPoints = 0;
        $results = [];

        foreach ($submittedAnswers as $questionId => $selectedAnswerIds) {
            $question = Question::with('answers')->find($questionId);
            
            if (!$question) continue;

            // Get all correct answers for this question
            $correctAnswerIds = $question->answers()
                ->where('is_correct', true)
                ->pluck('id')
                ->toArray();

            // Convert selected answers to array if it's not already
            $selectedAnswerIds = (array) $selectedAnswerIds;

            // Sort both arrays to compare them properly
            sort($correctAnswerIds);
            sort($selectedAnswerIds);

            // Check if selected answers match correct answers exactly
            $isCorrect = $correctAnswerIds == $selectedAnswerIds;

            // Add points if answer is correct
            if ($isCorrect) {
                $totalPoints += $question->points;
            }

            // Store result for this question
            $results[$questionId] = [
                'question_text' => $question->question_text,
                'is_correct' => $isCorrect,
                'points' => $isCorrect ? $question->points : 0,
                'correct_answers' => Answer::whereIn('id', $correctAnswerIds)->pluck('answer_text')->toArray(),
                'selected_answers' => Answer::whereIn('id', $selectedAnswerIds)->pluck('answer_text')->toArray()
            ];
        }

        return view('results', compact('results', 'totalPoints'));
    }

    public function test()
    {
        // Получаем все предметы для выбора
        $lessons = Lesson::all();
        
        return view('test', compact('lessons'));
    }

    public function startTest(Request $request)
    {
        $request->validate([
            'first_optional_lesson' => 'required|exists:lessons,id',
            'second_optional_lesson' => 'required|exists:lessons,id|different:first_optional_lesson',
        ]);

        // Сохраняем выбранные предметы для пробного ЕНТ
        session([
            'ent_lesson_1' => $request->first_optional_lesson,
            'ent_lesson_2' => $request->second_optional_lesson,
            'test_type' => 'ent'
        ]);

        // Перенаправляем на генерацию вопросов для первого предмета
        return redirect()->route('generate.questions', ['lesson' => $request->first_optional_lesson]);
    }

    public function startSelectiveTest(Request $request)
    {
        // Логируем полученные данные для отладки
        \Log::info('startSelectiveTest called', [
            'request_data' => $request->all(),
            'lesson_id' => $request->input('lesson_id')
        ]);

        $request->validate([
            'lesson_id' => 'required|exists:lessons,id',
        ]);

        // Сохраняем выбранный предмет в сессию
        session([
            'selected_lesson_id' => $request->lesson_id,
            'test_type' => 'selective'
        ]);

        \Log::info('Redirecting to generate questions', ['lesson_id' => $request->lesson_id]);

        // Перенаправляем на страницу с вопросами по выбранному предмету
        return redirect()->route('generate.questions', ['lesson' => $request->lesson_id]);
    }
} 