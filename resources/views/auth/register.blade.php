@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Регистрация</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка регистрации"/>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            @include('forms.register')
        </form>
    </div>

@endsection
