{{-- тут хранится шаблон соновного html файла --}}
@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Авторизация@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
<h1>Авторизация</h1>

<ul>
  @foreach ($errors->all() as $massage)
  <li>
      {{ $massage }}
  </li>
  @endforeach
</ul>

<p>Пожалуйста авторизуйтесь</p>
<form action="{{ route('auth') }}" method="post" novalidate>
  @csrf
  <div class="form-floating">
    <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
    <label for="floatingInput">Email</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    <label for="floatingPassword">Пароль</label></br>
  </div>
    <button class="btn btn-primary w-100 py-2" type="submit">Авторизоваться</button>
  </form></br>
  <p>Еще нет аккаунта? Зарегистрируйтесь.</p>
  <form action="{{ route('reg') }}">
    <button class="btn btn-primary w-100 py-2" type="submit">Регистрация</button>
  </form>
@endsection