<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        body { background: #f7fafd !important; }
        .navbar { background: #fff; box-shadow: 0 2px 8px #0001; }
        .navbar-brand { font-weight: 700; font-size: 1.3rem; }
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
        .dashboard-container {
            display: flex;
            min-height: 80vh;
            gap: 2rem;
        }
        .sidebar {
            background: none;
            min-width: 220px;
            max-width: 260px;
            padding: 2rem 1rem 2rem 1rem;
            border-radius: 1.2rem;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 2rem;
        }
        .sidebar .user-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .sidebar .user-info img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
        }
        .sidebar .user-info .user-name {
            font-weight: 600;
            font-size: 1.1rem;
        }
        .sidebar .nav {
            width: 100%;
            flex-direction: column;
            gap: .5rem;
        }
        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: .7rem;
            font-size: 1.08rem;
            color: #222;
            border-radius: .7rem;
            padding: .7rem 1rem;
            transition: background .2s;
            text-decoration: none;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            background: #fff;
            font-weight: 600;
            color: #1877f2;
        }
        .sidebar .nav-link i { font-size: 1.2rem; }
        .dashboard-main {
            flex: 1;
            padding: 2.5rem 2rem 2rem 0;
        }
        .dashboard-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 2rem;
        }
        .subscription-summary {
            background: #fff;
            border-radius: 1rem;
            padding: 1.2rem 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 2rem;
        }
        .subscription-summary .cert-img {
            width: 180px;
            border-radius: .8rem;
            object-fit: cover;
        }
        .subjects-list {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            flex-wrap: wrap;
        }
        .subject-btn {
            background: #fff;
            border: 1.5px solid #e0e4ea;
            border-radius: .8rem;
            padding: .8rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: .7rem;
            transition: border .2s, color .2s;
            color: #222;
        }
        .subject-btn:hover, .subject-btn:focus {
            border-color: #1877f2;
            color: #1877f2;
        }
        .history-table {
            background: #fff;
            border-radius: 1rem;
            padding: 1.2rem 1.5rem;
            margin-bottom: 2rem;
        }
        .history-table table {
            width: 100%;
            margin-bottom: 0;
        }
        .history-table th, .history-table td {
            padding: .7rem 1rem;
            text-align: left;
        }
        .history-table th {
            color: #888;
            font-weight: 500;
            font-size: 1rem;
            border-bottom: 1.5px solid #e0e4ea;
        }
        .history-table tr:not(:last-child) td {
            border-bottom: 1px solid #f0f0f0;
        }
        @media (max-width: 767px) {
            .hero-section { padding: 1.2rem .5rem; }
            .hero-title { font-size: 1.3rem; }
            .big-title { font-size: 1.2rem; }
        }
        @media (max-width: 900px) {
            .dashboard-container { flex-direction: column; }
            .sidebar { flex-direction: row; align-items: flex-start; min-width: 0; max-width: 100vw; gap: 1.5rem; }
            .dashboard-main { padding: 2rem 0 0 0; }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">EduTest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Войти</a>
                            </li>
                        @endif
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Регистрация</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Выйти
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>