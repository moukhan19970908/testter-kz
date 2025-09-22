<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .test-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }
        .test-header {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 16px #0001;
        }
        .test-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }
        .question-counter {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 2rem;
        }
        .question-text {
            font-size: 1.3rem;
            font-weight: 600;
            color: #333;
            margin-bottom: 2rem;
            line-height: 1.5;
        }
        .answer-option {
            background: #fff;
            border: 2px solid #e0e4ea;
            border-radius: 0.8rem;
            padding: 1.2rem 1.5rem;
            margin-bottom: 1rem;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .answer-option:hover {
            border-color: #1877f2;
            background: #f8f9ff;
        }
        .answer-option.selected {
            border-color: #1877f2;
            background: #f0f4ff;
        }
        .answer-radio {
            width: 20px;
            height: 20px;
            border: 2px solid #e0e4ea;
            border-radius: 50%;
            position: relative;
            transition: all 0.2s;
        }
        .answer-radio.checked {
            border-color: #1877f2;
            background: #1877f2;
        }
        .answer-radio.checked::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 8px;
            height: 8px;
            background: #fff;
            border-radius: 50%;
        }
        .answer-text {
            font-size: 1.1rem;
            color: #333;
            flex: 1;
        }
        .test-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 3rem;
            gap: 1rem;
        }
        .btn-test {
            padding: 0.8rem 2rem;
            border-radius: 0.8rem;
            font-weight: 500;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }
        .btn-previous {
            background: #f8f9fa;
            color: #666;
            border: 2px solid #e0e4ea;
        }
        .btn-previous:hover {
            background: #e9ecef;
            color: #333;
        }
        .btn-next {
            background: #1877f2;
            color: #fff;
        }
        .btn-next:hover {
            background: #166fe5;
        }
        .btn-finish {
            background: #28a745;
            color: #fff;
        }
        .btn-finish:hover {
            background: #218838;
        }
        .progress-bar {
            width: 100%;
            height: 8px;
            background: #e0e4ea;
            border-radius: 4px;
            margin-bottom: 2rem;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: #1877f2;
            border-radius: 4px;
            transition: width 0.3s ease;
        }
        .hidden {
            display: none;
        }
        @media (max-width: 768px) {
            .test-container {
                padding: 1rem;
            }
            .test-title {
                font-size: 2rem;
            }
            .question-text {
                font-size: 1.1rem;
            }
            .test-actions {
                flex-direction: column;
                gap: 1rem;
            }
            .btn-test {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="test-container">
        <div class="test-header">
            <div class="test-title">History of Kazakhstan Test</div>
            <div class="question-counter">Question <span id="current-question">1</span> of <span id="total-questions">{{ count($questions) }}</span></div>
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill" style="width: 10%"></div>
            </div>
        </div>

        <form id="test-form" method="POST" action="{{ route('submit.answers') }}">
            @csrf
            @foreach($questions as $index => $question)
                <div class="question-container {{ $index === 0 ? '' : 'hidden' }}" data-question="{{ $index + 1 }}">
                    <div class="question-text">{{ $question->question_text }}</div>
                    
                    <div class="answers-container">
                        @foreach($question->answers as $answer)
                            <div class="answer-option" data-answer-id="{{ $answer->id }}" data-question-id="{{ $question->id }}">
                                <div class="answer-radio"></div>
                                <div class="answer-text">{{ $answer->answer_text }}</div>
                                <input type="radio" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}" class="hidden">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="test-actions">
                <button type="button" class="btn-test btn-previous" id="prev-btn" disabled>Previous Question</button>
                <button type="button" class="btn-test btn-next" id="next-btn">Next Question</button>
                <button type="button" class="btn-test btn-finish hidden" id="finish-btn">Finish Test</button>
            </div>
        </form>
    </div>

    <script>
        let currentQuestion = 1;
        const totalQuestions = {{ count($questions) }};
        const questionContainers = document.querySelectorAll('.question-container');
        const progressFill = document.getElementById('progress-fill');
        const currentQuestionSpan = document.getElementById('current-question');
        const prevBtn = document.getElementById('prev-btn');
        const nextBtn = document.getElementById('next-btn');
        const finishBtn = document.getElementById('finish-btn');

        function updateProgress() {
            const progress = (currentQuestion / totalQuestions) * 100;
            progressFill.style.width = progress + '%';
            currentQuestionSpan.textContent = currentQuestion;
        }

        function showQuestion(questionNum) {
            questionContainers.forEach((container, index) => {
                if (index + 1 === questionNum) {
                    container.classList.remove('hidden');
                } else {
                    container.classList.add('hidden');
                }
            });

            // Update buttons
            prevBtn.disabled = questionNum === 1;
            if (questionNum === totalQuestions) {
                nextBtn.classList.add('hidden');
                finishBtn.classList.remove('hidden');
            } else {
                nextBtn.classList.remove('hidden');
                finishBtn.classList.add('hidden');
            }

            updateProgress();
        }

        function saveAnswer(questionId, answerId) {
            const radioInput = document.querySelector(`input[name="answers[${questionId}][]"][value="${answerId}"]`);
            radioInput.checked = true;
        }

        // Answer selection
        document.querySelectorAll('.answer-option').forEach(option => {
            option.addEventListener('click', function() {
                const questionId = this.dataset.questionId;
                const answerId = this.dataset.answerId;
                
                // Remove selection from other options in the same question
                const questionContainer = this.closest('.question-container');
                questionContainer.querySelectorAll('.answer-option').forEach(opt => {
                    opt.classList.remove('selected');
                    opt.querySelector('.answer-radio').classList.remove('checked');
                });
                
                // Select current option
                this.classList.add('selected');
                this.querySelector('.answer-radio').classList.add('checked');
                
                // Save answer
                saveAnswer(questionId, answerId);
            });
        });

        // Navigation
        nextBtn.addEventListener('click', function() {
            if (currentQuestion < totalQuestions) {
                currentQuestion++;
                showQuestion(currentQuestion);
            }
        });

        prevBtn.addEventListener('click', function() {
            if (currentQuestion > 1) {
                currentQuestion--;
                showQuestion(currentQuestion);
            }
        });

        finishBtn.addEventListener('click', function() {
            document.getElementById('test-form').submit();
        });

        // Initialize
        showQuestion(1);
    </script>
</body>
</html> 