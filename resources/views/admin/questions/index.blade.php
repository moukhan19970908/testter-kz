@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Вопросы урока "{{ $lesson->name }}"</h5>
                    <a href="{{ route('admin.lessons.questions.create', $lesson) }}" class="btn btn-primary">Добавить вопрос</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Вопрос</th>
                                <th>Диапазон</th>
                                <th>Баллы</th>
                                <th>Правильные ответы</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questions as $question)
                            <tr>
                                <td>{{ $question->id }}</td>
                                <td>{{ $question->question_text }}</td>
                                <td>{{ $question->range }}</td>
                                <td>{{ $question->points }}</td>
                                <td>
                                    @foreach ($question->answers as $answer)
                                        @if ($answer->is_correct)
                                            <div class="text-success">{{ $answer->answer_text }}</div>
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('admin.lessons.questions.edit', [$lesson, $question]) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                    <form action="{{ route('admin.lessons.questions.destroy', [$lesson, $question]) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 