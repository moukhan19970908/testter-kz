@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Уроки</h5>
                    <a href="{{ route('admin.lessons.create') }}" class="btn btn-primary">Добавить урок</a>
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
                                <th>Название</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $lesson->id }}</td>
                                <td>{{ $lesson->name }}</td>
                                <td>{{ $lesson->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.lessons.edit', $lesson) }}" class="btn btn-sm btn-primary">Редактировать</a>
                                    <form action="{{ route('admin.lessons.destroy', $lesson) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Вы уверены?')">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $lessons->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 