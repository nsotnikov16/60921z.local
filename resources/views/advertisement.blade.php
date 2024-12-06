@extends('layouts.app')

@section('content')
    <h1>
        @if ($advertisement)
            Объявление "{{ $advertisement->name }}"
        @else
            Объявление по данному ID не найдено
        @endif
    </h1>
    @if ($advertisement)
        <table border="1" class="table table-bordered">
            <thead>
                <tr>
                    <td>Поле</td>
                    <td>Значение</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>id</td>
                    <td>{{ $advertisement->id }}</td>
                </tr>
                <tr>
                    <td>Название</td>
                    <td>{{ $advertisement->name }}</td>
                </tr>
                <tr>
                    <td>Цена</td>
                    <td>{{ $advertisement->price }}</td>
                </tr>
                <tr>
                    <td>Категория</td>
                    <td>{{ $advertisement->category->name }}</td>
                </tr>
            </tbody>
        </table>

        @if (count($advertisement->messages))
            <br>
            <h2>Сообщения по объявлению</h2>
            <table border="1" class="table table-bordered">
                <thead>
                    <tr>
                        <td>id</td>
                        <td>От кого (id пользователя)</td>
                        <td>Кому (id пользователя)</td>
                        <td>Текст</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($advertisement->messages as $message)
                        <tr>
                            <td>{{ $message->id }}</td>
                            <td>{{ $message->user_from_id }}</td>
                            <td>{{ $message->user_to_id }}</td>
                            <td>{{ $message->content }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @endif
    @endif
@endsection
