@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Предметы') }}</div>

                <div class="card-body">
                    <div class="list-group">
                        @foreach($lessons as $lesson)
                            <a href="{{ route('generate.questions', $lesson->id) }}" 
                               class="list-group-item list-group-item-action">
                                {{ $lesson->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 