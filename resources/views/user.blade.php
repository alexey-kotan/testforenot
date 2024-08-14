@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Страница пользователя@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
    <h1>Страница пользователя</h1>

    <form action="{{ route('convert') }}">
        <button class="btn btn-primary w-100 py-2" type="submit">Конвертация валют</button>
    </form></br>

    <form action="{{ route('logout') }}">
        <button class="btn btn-primary w-100 py-2" type="submit">Выйти из аккаунта</button>
    </form>
        

@endsection