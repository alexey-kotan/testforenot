{{-- тут хранится шаблон соновного html файла --}}
@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Авторизация@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
<h1>Главная страница</h1>

<form action="{{ route('auth') }}">
    <p>Пожалуйста авторизуйтесь</p>
    <button class="btn btn-primary w-100 py-2" type="submit">Авторизоваться</button>
  </form></br>
  <p>Еще нет аккаунта? Зарегистрируйтесь.</p>
  <form action="{{ route('reg') }}">
    <button class="btn btn-primary w-100 py-2" type="submit">Регистрация</button>
  </form>
@endsection