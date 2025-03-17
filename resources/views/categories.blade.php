@extends('layouts.app')

@section('content')
    <h1>Список категорий</h1>
    @if (!empty($categories))
        <form action="{{ route('categories.index') }}" method="GET" class="mb-3 w-25">
            <label class="form-label" for="perPage">Элементов на странице</label>
            <div class="d-flex">
                <select name="perPage" id="perPage" class="form-select">
                    <option value="5" @selected($categories->perPage() == 5)>5</option>
                    <option value="10" @selected($categories->perPage() == 10)>10</option>
                    <option value="15" @selected($categories->perPage() == 15)>15</option>
                </select>
                <button class="btn btn-primary ms-2">применить</button>
            </div>
        </form>
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
        {{ $categories->links() }}
    @else
        <p>Категории отсутствуют</p>
    @endif
@endsection
