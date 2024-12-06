@extends('layouts.app')

@section('content')
    <h1>
        @if ($category)
            Список товаров категории {{ $category->name }}
        @else
            Неверный ID категории
        @endif
    </h1>
    @if (count($category->ads))
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Наименование</td>
                    <td>Цена</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($category->ads as $adv)
                    <tr>
                        <td>{{ $adv->id }}</td>
                        <td>{{ $adv->name }}</td>
                        <td>{{ $adv->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Товары в данной категории отсутствуют</p>
    @endif
@endsection
