@extends('layouts.app')

@section('title', 'Создать новость')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создать новость</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка валидации"/>
        @elseif (session('message'))
            <x-messages.success :message="Session::get('message')"/>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('articles.store') }}">
            @csrf
            @include('forms.article')
        </form>
    </div>

@endsection