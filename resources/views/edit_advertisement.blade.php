@extends('layouts.app')

@section('content')
    <a class="btn btn-primary d-inline-block my-3" href="{{ route('advertisements.index') }}">Вернуться к списку</a>
    @if ($advertisement)
        <h1>Редактирование объявления</h1>
        @include('form', $form)
    @else
        <h1>Объявление по данному ID не найдено</h1>
    @endif
@endsection
