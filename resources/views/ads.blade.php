@extends('layouts.app')

@section('content')
    <h1>Список объявлений</h1>
    @if (count($ads))
        <table border="1">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Наименование</td>
                    <td>Цена</td>
                    <td>Категория</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('advertisements.show', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->price }}</td>
                        <td><a href="{{ route('categories.show', $item->category->id) }}">{{ $item->category->name }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Объявления отсутствуют</p>
    @endif
@endsection
