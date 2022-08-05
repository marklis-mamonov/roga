@extends('layouts.app')

@section('title', 'Редактировать новость')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Редактировать новость</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка валидации"/>
        @elseif (session('message'))
            <x-messages.success :message="Session::get('message')"/>
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