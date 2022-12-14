@extends('layouts.inner')

@section('title', $article->title)

@section('content')

<div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $article->title }}</h1>

        @admin
            <a href="{{ route('articles.edit', $article) }}">
                <x-buttons.orange value="Редактировать новость"/>
            </a>
        @endadmin
        
        <div class="space-y-4">
        @if ($article->image)
            <img src="{{ Storage::url($article->image->path) }}" alt="" title="">
        @endif

            {!! $article->body !!}

        </div>

        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('articles.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
    </div>
</div>

@endsection