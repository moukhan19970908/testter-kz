@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="container mb-5">
        <div class="hero-section d-flex flex-column flex-md-row align-items-center justify-content-between gap-4">
            <img src="https://img.freepik.com/free-vector/young-people-studying-together_52683-28610.jpg?w=826&t=st=1716820000~exp=1716820600~hmac=demo" alt="Students" class="hero-img mb-3 mb-md-0">
            <div class="flex-grow-1 ms-md-4">
                <div class="hero-title mb-2">Готовься к ЕНТ<br>с EduTest</div>
                <div class="hero-desc mb-4">Наша платформа предлагает широкий выбор тестов и учебных материалов, чтобы помочь вам достичь своих академических целей. Начните свое путешествие к успеху уже сегодня!</div>
                <a href="#" class="btn btn-main btn-lg">Начать тестирование</a>
            </div>
        </div>
    </div>

    <!-- About Us -->
    <div class="container mb-5">
        <div class="section-title">О нас</div>
        <div class="big-title">Наша платформа — это современное решение для подготовки студентов и школьников.
        Наша цель — сделать обучение удобным, понятным и доступным.</div>
        <div class="row g-3 mb-4">
            <div class="col-md-3 col-12">
                <div class="feature-card text-center h-100">
                    <i class="fa-solid fa-clipboard-check"></i>
                    <div class="fw-bold mt-2">Постоянное пополнение тестов</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="feature-card text-center h-100">
                    <i class="fa-solid fa-magnifying-glass-chart"></i>
                    <div class="fw-bold mt-2">Подробный анализ и рекомендации</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="feature-card text-center h-100">
                    <i class="fa-solid fa-mobile-screen-button"></i>
                    <div class="fw-bold mt-2">Доступ с любого устройства</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="feature-card text-center h-100">
                    <i class="fa-solid fa-layer-group"></i>
                    <div class="fw-bold mt-2">Все предметы — по одной подписке</div>
                </div>
            </div>
        </div>
        <div class="section-title">Advantages</div>
        <div class="row">
            <div class="col-md-6 col-12">
                <div class="checklist">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="adv1" disabled>
                        <label class="form-check-label" for="adv1">All subjects - with one subscription</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="adv2" disabled>
                        <label class="form-check-label" for="adv2">Access from any device</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="adv3" disabled>
                        <label class="form-check-label" for="adv3">Constant updating of tasks</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="adv4" disabled>
                        <label class="form-check-label" for="adv4">Detailed analysis and recommendations</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="adv5" disabled>
                        <label class="form-check-label" for="adv5">Examination and training modes</label>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Choose Us -->
    <div class="container mb-5">
        <div class="section-title">Почему выбирают нас</div>
        <div class="big-title">Наша платформа разработана для того, чтобы помочь вам достичь успеха.</div>
        <div class="row g-3">
            <div class="col-md-3 col-12">
                <div class="choose-card text-center h-100">
                    <i class="fa-solid fa-circle-check"></i>
                    <div class="fw-bold mt-2">Простая и доступная система</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="choose-card text-center h-100">
                    <i class="fa-solid fa-clock"></i>
                    <div class="fw-bold mt-2">Готовься в любое удобное время</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="choose-card text-center h-100">
                    <i class="fa-solid fa-shield-halved"></i>
                    <div class="fw-bold mt-2">Поддержка и обновления</div>
                </div>
            </div>
            <div class="col-md-3 col-12">
                <div class="choose-card text-center h-100">
                    <i class="fa-solid fa-bolt"></i>
                    <div class="fw-bold mt-2">Экономь время — работай на результат!</div>
                </div>
            </div>
        </div>
    </div>

    @endsection