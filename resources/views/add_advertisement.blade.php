@extends('layouts.app')

@section('content')
    <a class="btn btn-primary d-inline-block my-3" href="{{ route('advertisements.index') }}">Вернуться к списку</a>
    <h1>Создание объявления</h1>
    @include('form', $form)
@endsection
