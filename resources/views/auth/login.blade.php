@extends('layouts.app')

@section('title', 'Авторизация')

@section('content')

    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Авторизация</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка авторизации"/>
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('login') }}">
            @csrf
            @include('forms.auth')
        </form>
    </div>

@endsection
