@extends('layouts.inner')

@section('title', 'Все новости')

@section('content')
<div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Новости</h1>
        <div class="space-y-4">

            @if (session('message'))
                <x-messages.success :message="Session::get('message')"/>
            @endif

            <a href="{{ route('articles.create') }}">
                <x-buttons.orange value="Добавить новость"/>
            </a>

            @foreach ($articles as $article)
                <x-panels.articles.item :article="$article"/>

            @endforeach
            {{ $articles->onEachSide(1)->links() }}
        </div>
    </div>
</div>

@endsection