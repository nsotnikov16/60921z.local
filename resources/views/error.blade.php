@extends('layouts.app')

@section('content')
    <h2>{{$message}}</h2>
    <a href="{{url()->previous() }}">Назад</a>
@endsection
