@extends('layouts.app')

@section('title', 'Создать новость')

@section('content')

<main class="flex-1 container mx-auto bg-white">
    <div class="p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Создать новость</h1>
        @if($errors->count())
            <x-messages.error message="Ошибка валидации"/>
        @elseif (Session::get('message') == "Успешно")
            <x-messages.success message="Новость успешно добавлена"/>
        @endif

        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <div class="mt-8 max-w-md">
                <div class="grid grid-cols-1 gap-6">
                    <div class="block">
                        <x-input.group for="title" title="Заголовок новости" :errors="$errors">
                            <x-input.text name="title" placeholder="Введите заголовок"/>
                        </x-input.group>
                    </div>
                    <div class="block">
                        <x-input.group for="description" title="Краткое описание новости">
                            <x-input.textarea name="description"/>
                        </x-input.group>
                    </div>
                    <div class="block">
                        <x-input.group for="body" title="Детальное описание">
                            <x-input.textarea name="body"/>
                        </x-input.group>
                    </div>
                    <div class="block">
                        <x-input.checkbox name="is_published" title="Опубликовать новость"/>
                    </div>
                    <div class="block">
                        <x-buttons.orange value="Сохранить"/>
                        <x-buttons.gray value="Отменить"/>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection