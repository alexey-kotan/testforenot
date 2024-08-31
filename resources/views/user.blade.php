@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Страница пользователя@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
    <h2>Пользователь {{ $user->email }}</h2>
    
    <h3>Меню:</h3>
    <form action="{{ route('convert') }}">
        <button class="btn btn-primary w-100 py-2" type="submit">Конвертация валют</button>
    </form></br>

@endsection