@extends('layouts.app')

@section('title', 'Редактировать новость')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Редактировать новость</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка валидации"/>
        @elseif (Session::get('message') == "Успешно")
            <x-messages.success message="Новость успешно изменена"/>
        @endif

        <form method="POST" action="{{ route('articles.update', $article) }}">
            @method('PATCH')
            @csrf
            @include('forms.article')
        </form>
        <br>
        <form method="POST" action="{{ route('articles.destroy', $article) }}">
            @method('DELETE')
            @csrf
            <x-buttons.gray value="Удалить новость"/>
        </form>
    </div>

@endsection