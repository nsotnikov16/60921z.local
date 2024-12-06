@extends('layouts.app')

@section('content')
    <h1>Список объявлений</h1>
    <div class="mb-3">
        <a href="{{ route('advertisements.create') }}" class="btn btn-primary">Создать объявление</a>
    </div>
    @if (count($ads))
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Наименование</td>
                    <td>Цена</td>
                    <td>Категория</td>
                    <td width="50px"></td>
                    <td width="50px"></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($ads as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td><a href="{{ route('advertisements.show', $item->id) }}">{{ $item->name }}</a></td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('categories.show', $item->category->id) }}">{{ $item->category->name }}</a>
                        </td>
                        <td>
                            <a href="{{ route('advertisements.edit', $item->id) }}" class="btn btn-success">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('advertisements.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Объявления отсутствуют</p>
    @endif
@endsection
