@extends('layouts.app')

@section('title', 'Создать новость')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создать новость</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка валидации"/>
        @elseif (Session::get('message') == "Успешно")
            <x-messages.success message="Новость успешно добавлена"/>
        @endif

        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            @include('forms.article')
        </form>
    </div>

@endsection