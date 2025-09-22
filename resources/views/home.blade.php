@extends('layouts.app')

@section('content')
<style>
    .hero-img { max-width: 320px; border-radius: 1rem; }
    .hero-section { background: #fff; border-radius: 1.5rem; box-shadow: 0 2px 16px #0001; padding: 2.5rem 2rem; margin-bottom: 2.5rem; }
    .hero-title { font-size: 2.2rem; font-weight: 700; }
    .hero-desc { font-size: 1.1rem; color: #444; }
    .btn-main { background: #1877f2; color: #fff; border-radius: .7rem; font-weight: 500; }
    .section-title { font-size: 1.2rem; font-weight: 600; margin-bottom: 1rem; }
    .big-title { font-size: 2rem; font-weight: 700; margin-bottom: 1.5rem; }
    .feature-card, .choose-card { background: #fff; border-radius: 1rem; box-shadow: 0 2px 8px #0001; padding: 1.5rem; height: 100%; }
    .feature-card i { font-size: 1.5rem; color: #1877f2; margin-bottom: .5rem; }
    .choose-card i { font-size: 1.3rem; color: #1877f2; margin-bottom: .5rem; }
    .form-check-input:checked { background-color: #1877f2; border-color: #1877f2; }
    .checklist .form-check { margin-bottom: .7rem; }
    .selective-testing {
        background: #fff;
        border-radius: 1rem;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 16px #0001;
    }
    .lesson-select {
        width: 100%;
        padding: 1rem;
        border: 2px solid #e0e4ea;
        border-radius: 0.8rem;
        font-size: 1rem;
        background: #fff;
        color: #333;
        margin-bottom: 1rem;
    }
    .lesson-select:focus {
        outline: none;
        border-color: #1877f2;
    }
    .btn-start-selective {
        background: #6f42c1;
        color: #fff;
        border: none;
        border-radius: 0.8rem;
        padding: 1rem 2rem;
        font-size: 1.1rem;
        font-weight: 500;
        width: 100%;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-start-selective:hover {
        background: #5a32a3;
    }
    @media (max-width: 767px) {
        .hero-section { padding: 1.2rem .5rem; }
        .hero-title { font-size: 1.3rem; }
        .big-title { font-size: 1.2rem; }
    }
</style>

<div class="dashboard-container">
    @include('partials.sidebar')
    <!-- Main Content -->
    <div class="dashboard-main">
        <div class="dashboard-title">Панель управления</div>
        
        <!-- Выборочное тестирование -->
        <div class="selective-testing">
            <div class="section-title">Выборочное тестирование</div>
            <div class="big-title">Выберите предмет для тестирования</div>
            <form action="{{ route('start.selective.test') }}" method="POST">
                @csrf
                <select name="lesson_id" class="lesson-select" required>
                    <option value="">Выберите предмет для тестирования</option>
                    @foreach($lessons as $lesson)
                        <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-start-selective">Начать тестирование</button>
            </form>
        </div>
        
        <div class="subscription-summary">
            <div>
                <div class="fw-bold mb-1">Сводка подписки</div>
                <div>Премиум</div>
                <div class="text-muted" style="font-size: 0.98rem;">Действителен до 15 июля 2024 г.</div>
            </div>
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="cert-img" alt="certificate">
        </div>
        <div class="fw-bold mb-3" style="font-size: 1.2rem;">Доступные предметы</div>
        <div class="subjects-list">
            <button class="subject-btn"><i class="fa-solid fa-book-open-reader"></i> Литература</button>
            <button class="subject-btn"><i class="fa-solid fa-flask"></i> Химия</button>
            <button class="subject-btn"><i class="fa-solid fa-code"></i> Программирование</button>
            <button class="subject-btn"><i class="fa-solid fa-calculator"></i> Математика</button>
        </div>
        <div class="fw-bold mb-3" style="font-size: 1.2rem;">История тестов</div>
        <div class="history-table">
            <table>
                <thead>
                    <tr>
                        <th>Предмет</th>
                        <th>Дата</th>
                        <th>Результат</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Литература</td>
                        <td><a href="#" style="color:#1877f2;text-decoration:underline;">20 июня 2024 г.</a></td>
                        <td>85%</td>
                    </tr>
                    <tr>
                        <td>Химия</td>
                        <td><a href="#" style="color:#1877f2;text-decoration:underline;">18 июня 2024 г.</a></td>
                        <td>78%</td>
                    </tr>
                    <tr>
                        <td>Математика</td>
                        <td><a href="#" style="color:#1877f2;text-decoration:underline;">15 июня 2024 г.</a></td>
                        <td>92%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <button class="btn btn-main mt-2">Начать новый тест</button>
    </div>
</div>
<!-- FontAwesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
@endsection
