@extends('layouts.app')

@section('content')
<style>
    .test-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 2rem;
    }
    .test-header {
        text-align: center;
        margin-bottom: 3rem;
    }
    .test-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 1rem;
    }
    .test-subtitle {
        font-size: 1.2rem;
        color: #666;
        margin-bottom: 2rem;
    }
    .test-type-section {
        background: #fff;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 16px #0001;
    }
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 1.5rem;
    }
    .test-type-options {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .test-type-card {
        border: 2px solid #e0e4ea;
        border-radius: 1rem;
        padding: 2rem;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #fff;
    }
    .test-type-card:hover {
        border-color: #1877f2;
        background: #f8f9ff;
    }
    .test-type-card.selected {
        border-color: #1877f2;
        background: #f0f4ff;
    }
    .test-type-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #1877f2;
    }
    .test-type-title {
        font-size: 1.3rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 0.5rem;
    }
    .test-type-description {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.4;
    }
    .subject-selection {
        background: #fff;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 16px #0001;
        display: none;
    }
    .subject-selection.show {
        display: block;
    }
    .subject-select {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e0e4ea;
        border-radius: 0.8rem;
        font-size: 1rem;
        background: #fff;
        color: #333;
        margin-bottom: 1rem;
    }
    .subject-select:focus {
        outline: none;
        border-color: #1877f2;
    }
    .subject-select:last-child {
        margin-bottom: 0;
    }
    .btn-start-test {
        background: #1877f2;
        color: #fff;
        border: none;
        border-radius: 0.8rem;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 500;
        width: 100%;
        margin-top: 2rem;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-start-test:hover {
        background: #166fe5;
    }
    .btn-start-test:disabled {
        background: #e0e4ea;
        color: #999;
        cursor: not-allowed;
    }
    .info-text {
        color: #666;
        font-size: 0.95rem;
        margin-top: 1rem;
        text-align: center;
    }
    .hidden {
        display: none;
    }
    @media (max-width: 768px) {
        .test-type-options {
            grid-template-columns: 1fr;
        }
        .test-container {
            padding: 1rem;
        }
    }
</style>

<div class="dashboard-container">
    @include('partials.sidebar')
    <div class="dashboard-main">
        <div class="test-container">
            <div class="test-header">
                <div class="test-title">Выбор типа тестирования</div>
                <div class="test-subtitle">Выберите, какой тип теста вы хотите пройти</div>
                
                @if(session('error'))
                    <div class="alert alert-danger" style="margin-top: 1rem; padding: 1rem; border-radius: 0.5rem; background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb;">
                        {{ session('error') }}
                    </div>
                @endif
                
                @if(session('success'))
                    <div class="alert alert-success" style="margin-top: 1rem; padding: 1rem; border-radius: 0.5rem; background: #d4edda; color: #155724; border: 1px solid #c3e6cb;">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            <form id="test-form" method="POST">
                @csrf
                <input type="hidden" name="test_type" id="test_type" value="">
                
                <div class="test-type-section">
                    <div class="section-title">Тип тестирования</div>
                    <div class="test-type-options">
                        <div class="test-type-card" data-type="single" onclick="selectTestType('single')">
                            <div class="test-type-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <div class="test-type-title">Тест по одному предмету</div>
                            <div class="test-type-description">Выберите один предмет для углубленного тестирования</div>
                        </div>
                        
                        <div class="test-type-card" data-type="ent" onclick="selectTestType('ent')">
                            <div class="test-type-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <div class="test-type-title">Пробный ЕНТ</div>
                            <div class="test-type-description">Выберите два предмета для комплексного тестирования</div>
                        </div>
                    </div>
                </div>

                <div class="subject-selection" id="single-subject-selection">
                    <div class="section-title">Выберите предмет</div>
                    <select name="single_lesson_id" id="single_lesson_id" class="subject-select">
                        <option value="">Выберите предмет для тестирования</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                    <div class="info-text">Выберите предмет, по которому хотите пройти тест</div>
                </div>

                <div class="subject-selection" id="ent-subject-selection">
                    <div class="section-title">Выберите два предмета для ЕНТ</div>
                    <select name="ent_lesson_1" id="ent_lesson_1" class="subject-select">
                        <option value="">Выберите первый предмет</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                    <select name="ent_lesson_2" id="ent_lesson_2" class="subject-select">
                        <option value="">Выберите второй предмет</option>
                        @foreach($lessons as $lesson)
                            <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                        @endforeach
                    </select>
                    <div class="info-text">Выберите два разных предмета для пробного ЕНТ</div>
                </div>

                <button type="submit" class="btn-start-test" id="start-test-btn" disabled>Начать тестирование</button>
            </form>
        </div>
    </div>
</div>

<script>
let selectedTestType = null;

function selectTestType(type) {
    // Убираем выделение с всех карточек
    document.querySelectorAll('.test-type-card').forEach(card => {
        card.classList.remove('selected');
    });
    
    // Выделяем выбранную карточку
    document.querySelector(`[data-type="${type}"]`).classList.add('selected');
    
    selectedTestType = type;
    document.getElementById('test_type').value = type;
    
    // Показываем соответствующую секцию выбора предметов
    document.getElementById('single-subject-selection').classList.toggle('show', type === 'single');
    document.getElementById('ent-subject-selection').classList.toggle('show', type === 'ent');
    
    // Обновляем кнопку
    updateStartButton();
}

function updateStartButton() {
    const startBtn = document.getElementById('start-test-btn');
    let canStart = false;
    
    console.log('updateStartButton called, selectedTestType:', selectedTestType);
    
    if (selectedTestType === 'single') {
        const singleLesson = document.getElementById('single_lesson_id').value;
        canStart = singleLesson !== '';
        console.log('Single test - lesson value:', singleLesson, 'canStart:', canStart);
    } else if (selectedTestType === 'ent') {
        const entLesson1 = document.getElementById('ent_lesson_1').value;
        const entLesson2 = document.getElementById('ent_lesson_2').value;
        canStart = entLesson1 !== '' && entLesson2 !== '' && entLesson1 !== entLesson2;
        console.log('ENT test - lesson1:', entLesson1, 'lesson2:', entLesson2, 'canStart:', canStart);
    }
    
    startBtn.disabled = !canStart;
    console.log('Button disabled:', startBtn.disabled);
}

// Обработчики изменения выбора предметов
document.getElementById('single_lesson_id').addEventListener('change', updateStartButton);
document.getElementById('ent_lesson_1').addEventListener('change', updateStartButton);
document.getElementById('ent_lesson_2').addEventListener('change', updateStartButton);

// Обработчик отправки формы
document.getElementById('test-form').addEventListener('submit', function(e) {
    console.log('Form submitted, test type:', selectedTestType);
    
    if (selectedTestType === 'single') {
        this.action = '{{ route("start.selective.test") }}';
        // Переименовываем поле для совместимости с контроллером
        document.getElementById('single_lesson_id').name = 'lesson_id';
        console.log('Single test - lesson ID:', document.getElementById('single_lesson_id').value);
    } else if (selectedTestType === 'ent') {
        this.action = '{{ route("start.test") }}';
        // Переименовываем поля для совместимости с существующим контроллером
        document.getElementById('ent_lesson_1').name = 'first_optional_lesson';
        document.getElementById('ent_lesson_2').name = 'second_optional_lesson';
        console.log('ENT test - lesson 1:', document.getElementById('ent_lesson_1').value, 'lesson 2:', document.getElementById('ent_lesson_2').value);
    }
    
    console.log('Form action:', this.action);
});
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection 