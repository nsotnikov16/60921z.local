@extends('layouts.app')

@section('content')
    <h1>Список категорий</h1>
    @if (!empty($categories))
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <td>id</td>
                    <td>Наименование</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>
                            <a href="{{ route('categories.show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Категории отсутствуют</p>
    @endif
@endsection
