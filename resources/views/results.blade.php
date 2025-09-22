<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Results - Test Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .results-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem;
        }
        .results-header {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 16px #0001;
            text-align: center;
        }
        .results-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }
        .score-display {
            background: linear-gradient(135deg, #1877f2, #42a5f5);
            color: #fff;
            border-radius: 1rem;
            padding: 2rem;
            margin: 2rem 0;
        }
        .score-number {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }
        .score-label {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        .question-result {
            background: #fff;
            border-radius: 1rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 8px #0001;
            border-left: 4px solid #e0e4ea;
        }
        .question-result.correct {
            border-left-color: #28a745;
        }
        .question-result.incorrect {
            border-left-color: #dc3545;
        }
        .question-number {
            font-size: 1.1rem;
            font-weight: 600;
            color: #666;
            margin-bottom: 0.5rem;
        }
        .question-text {
            font-size: 1.2rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 1rem;
            line-height: 1.4;
        }
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 600;
            font-size: 0.9rem;
            margin-bottom: 1rem;
        }
        .status-correct {
            background: #d4edda;
            color: #155724;
        }
        .status-incorrect {
            background: #f8d7da;
            color: #721c24;
        }
        .answers-section {
            margin-bottom: 1rem;
        }
        .answers-title {
            font-weight: 600;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .answer-item {
            background: #f8f9fa;
            border-radius: 0.5rem;
            padding: 0.8rem 1rem;
            margin-bottom: 0.5rem;
            border-left: 3px solid #e0e4ea;
        }
        .answer-item.correct {
            background: #d4edda;
            border-left-color: #28a745;
        }
        .answer-item.incorrect {
            background: #f8d7da;
            border-left-color: #dc3545;
        }
        .answer-item.selected {
            background: #cce5ff;
            border-left-color: #1877f2;
        }
        .points-display {
            font-size: 1.1rem;
            font-weight: 600;
            color: #666;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 3rem;
        }
        .btn-action {
            padding: 1rem 2rem;
            border-radius: 0.8rem;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-primary-action {
            background: #1877f2;
            color: #fff;
        }
        .btn-primary-action:hover {
            background: #166fe5;
            color: #fff;
        }
        .btn-secondary-action {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e0e4ea;
        }
        .btn-secondary-action:hover {
            background: #e9ecef;
            color: #333;
        }
        .summary-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin: 2rem 0;
        }
        .stat-card {
            background: #fff;
            border-radius: 0.8rem;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 8px #0001;
        }
        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #1877f2;
            margin-bottom: 0.5rem;
        }
        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }
        @media (max-width: 768px) {
            .results-container {
                padding: 1rem;
            }
            .results-title {
                font-size: 2rem;
            }
            .score-number {
                font-size: 3rem;
            }
            .action-buttons {
                flex-direction: column;
            }
            .btn-action {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="results-container">
        <div class="results-header">
            <div class="results-title">Результаты тестирования</div>
            <div class="score-display">
                <div class="score-number">{{ $totalPoints }}</div>
                <div class="score-label">баллов из {{ array_sum(array_column($results, 'max_points')) }}</div>
            </div>
            
            <div class="summary-stats">
                <div class="stat-card">
                    <div class="stat-number">{{ count($results) }}</div>
                    <div class="stat-label">Всего вопросов</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ count(array_filter($results, fn($r) => $r['is_correct'])) }}</div>
                    <div class="stat-label">Правильных ответов</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">{{ round((count(array_filter($results, fn($r) => $r['is_correct'])) / count($results)) * 100) }}%</div>
                    <div class="stat-label">Процент правильных</div>
                </div>
            </div>
        </div>

        @foreach($results as $questionId => $result)
            <div class="question-result {{ $result['is_correct'] ? 'correct' : 'incorrect' }}">
                <div class="question-number">Вопрос {{ $loop->iteration }}</div>
                <div class="question-text">{{ $result['question_text'] }}</div>
                
                <div class="status-badge {{ $result['is_correct'] ? 'status-correct' : 'status-incorrect' }}">
                    @if($result['is_correct'])
                        <i class="fas fa-check"></i> Правильно ({{ $result['points'] }} балл(ов))
                    @else
                        <i class="fas fa-times"></i> Неправильно (0 баллов)
                    @endif
                </div>

                <div class="answers-section">
                    <div class="answers-title">Ваши ответы:</div>
                    @forelse($result['selected_answers'] as $answer)
                        <div class="answer-item selected">
                            <i class="fas fa-check-circle" style="color: #1877f2; margin-right: 0.5rem;"></i>
                            {{ $answer }}
                        </div>
                    @empty
                        <div class="answer-item">
                            <i class="fas fa-times-circle" style="color: #dc3545; margin-right: 0.5rem;"></i>
                            Ответ не выбран
                        </div>
                    @endforelse
                </div>

                @if(!$result['is_correct'])
                    <div class="answers-section">
                        <div class="answers-title">Правильные ответы:</div>
                        @foreach($result['correct_answers'] as $answer)
                            <div class="answer-item correct">
                                <i class="fas fa-check-circle" style="color: #28a745; margin-right: 0.5rem;"></i>
                                {{ $answer }}
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach

        <div class="action-buttons">
            <a href="{{ route('main') }}" class="btn-action btn-primary-action">
                <i class="fas fa-home" style="margin-right: 0.5rem;"></i>
                Вернуться к главной
            </a>
            <a href="{{ route('home') }}" class="btn-action btn-secondary-action">
                <i class="fas fa-chart-line" style="margin-right: 0.5rem;"></i>
                К дашборду
            </a>
        </div>
    </div>
</body>
</html> 