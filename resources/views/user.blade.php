{{-- тут хранится шаблон соновного html файла --}}
@extends('app')
{{-- секция для указания названия страницы --}}
@section('title')Страница пользователя@endsection
{{-- секция, куда в основной шаблон html вставляется основной контент данной страницы (секцию нужно закрывать!) --}}
@section('content')
<h1>Страница пользователя</h1>

<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Pariatur voluptas blanditiis ad sed reprehenderit, 
    minus natus voluptatum quisquam nihil neque aperiam velit et facilis 
    soluta similique nisi. Vel, id eligendi!</p>


    <form action="{{ route('logout') }}">
        <button class="btn btn-primary w-100 py-2" type="submit">Выйти из аккаунта</button>
@endsection