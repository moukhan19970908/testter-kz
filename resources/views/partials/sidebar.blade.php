
<div class="sidebar">
    <div class="user-info">
        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="User">
        <span class="user-name">{{ Auth::user()->name ?? 'Анна' }}</span>
    </div>
    <nav class="nav flex-column w-100">
        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
            <i class="fa-solid fa-house"></i> Главная
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-book"></i> Предметы
        </a>
        <a class="nav-link {{ request()->routeIs('test') ? 'active' : '' }}" href="{{ route('test') }}">
            <i class="fa-solid fa-file-lines"></i> Тесты
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-chart-bar"></i> Результаты
        </a>
        <a class="nav-link" href="#">
            <i class="fa-solid fa-gear"></i> Настройки
        </a>
    </nav>
</div>