@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

        <section class="bg-white">
            <div data-slick-carousel>
                @foreach ($banners as $banner)
                <div class="relative banner">
                    <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="{{ Storage::url($banner->image_path) }}" alt="" title=""></div>
                    <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                        <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">{{ $banner->title }}</h1>
                        <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">{{ $banner->description }}
                        @if ($banner->link)    
                            <a href="{{ $banner->link }}" class="text-orange hover:opacity-75">подробнее</a>
                        @endif
                        </h2>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
        <x-panels.week_cars :weekCars="$weekCars"/>
        <x-panels.news :articles="$articles"/>

@endsection