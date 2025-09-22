@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Редактировать вопрос</h5>
                </div>

                <div class="card-body">
                    <form action="{{ route('admin.lessons.questions.update', [$lesson, $question]) }}" method="POST" id="questionForm">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="question_text" class="form-label">Текст вопроса</label>
                            <textarea class="form-control @error('question_text') is-invalid @enderror" id="question_text" name="question_text" rows="3" required>{{ old('question_text', $question->question_text) }}</textarea>
                            @error('question_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="range" class="form-label">Диапазон вопросов</label>
                            <select class="form-control @error('range') is-invalid @enderror" id="range" name="range" required>
                                <option value="">Выберите диапазон</option>
                                @foreach($ranges as $key => $value)
                                    <option value="{{ $key }}" {{ old('range', $question->range) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('range')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="points" class="form-label">Количество баллов</label>
                            <select class="form-control @error('points') is-invalid @enderror" id="points" name="points" required>
                                <option value="">Выберите количество баллов</option>
                                @foreach($points as $key => $value)
                                    <option value="{{ $key }}" {{ old('points', $question->points) == $key ? 'selected' : '' }}>{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('points')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3" id="answersContainer">
                            <label class="form-label">Варианты ответов</label>
                            <div class="answers-list">
                                @foreach($question->answers as $index => $answer)
                                    <div class="answer-item mb-2">
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="correct_answers[]" value="{{ $index }}" {{ $answer->is_correct ? 'checked' : '' }}>
                                            </div>
                                            <input type="text" class="form-control" name="answers[]" value="{{ $answer->answer_text }}" placeholder="Введите вариант ответа" required>
                                            <button type="button" class="btn btn-danger remove-answer" {{ $question->answers->count() <= 1 ? 'disabled' : '' }}>Удалить</button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button type="button" class="btn btn-secondary mt-2" id="addAnswerBtn">Добавить вариант ответа</button>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.lessons.questions.index', $lesson) }}" class="btn btn-secondary">Назад</a>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Добавляем jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Добавление варианта ответа
    document.getElementById('addAnswerBtn').addEventListener('click', function() {
        const container = document.querySelector('.answers-list');
        const index = container.children.length;
        
        const newAnswer = document.createElement('div');
        newAnswer.className = 'answer-item mb-2';
        newAnswer.innerHTML = `
            <div class="input-group">
                <div class="input-group-text">
                    <input type="checkbox" name="correct_answers[]" value="${index}">
                </div>
                <input type="text" class="form-control" name="answers[]" placeholder="Введите вариант ответа" required>
                <button type="button" class="btn btn-danger remove-answer">Удалить</button>
            </div>
        `;
        
        container.appendChild(newAnswer);
        updateRemoveButtons();
        
        // Добавляем обработчик для новой кнопки удаления
        newAnswer.querySelector('.remove-answer').addEventListener('click', function() {
            removeAnswer(this);
        });
    });

    // Удаление варианта ответа
    function removeAnswer(button) {
        button.closest('.answer-item').remove();
        updateRemoveButtons();
        reindexCheckboxes();
    }

    // Обновление состояния кнопок удаления
    function updateRemoveButtons() {
        const buttons = document.querySelectorAll('.remove-answer');
        const hasMultipleAnswers = document.querySelectorAll('.answer-item').length > 1;
        
        buttons.forEach(button => {
            button.disabled = !hasMultipleAnswers;
        });
    }

    // Переиндексация чекбоксов
    function reindexCheckboxes() {
        const checkboxes = document.querySelectorAll('input[name="correct_answers[]"]');
        checkboxes.forEach((checkbox, index) => {
            checkbox.value = index;
        });
    }

    // Добавляем обработчики для существующих кнопок удаления
    document.querySelectorAll('.remove-answer').forEach(button => {
        button.addEventListener('click', function() {
            removeAnswer(this);
        });
    });
});
</script>
@endsection 