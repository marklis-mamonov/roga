@extends('layouts.app')

@section('title', 'Главная страница')

@section('content')

<main class="flex-1 container mx-auto bg-white">
        <section class="bg-white">
            <div data-slick-carousel>
                <div class="relative banner">
                    <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/pictures/test_banner_1.jpg" alt="" title=""></div>
                    <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                        <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Астон Мартин, получи секретное Задание</h1>
                        <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                    </div>
                </div>
                <div class="relative banner">
                    <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/pictures/test_banner_2.jpg" alt="" title=""></div>
                    <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                        <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Роллс Ройс, получи Отчество к&nbsp;своему имени</h1>
                        <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                    </div>
                </div>
                <div class="relative banner">
                    <div class="w-full h-full bg-black"><img class="w-full h-full object-cover object-center opacity-70" src="/pictures/test_banner_3.jpg" alt="" title=""></div>
                    <div class="absolute top-0 left-0 w-full px-10 py-4 sm:px-20 sm:py-8 lg:px-40 lg:py-10">
                        <h1 class="text-gray-100 text-lg sm:text-2xl md:text-4xl xl:text-6xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold uppercase">Купи Бентли, получи бейсболку</h1>
                        <h2 class="text-gray-200 italic text-xs sm:text-lg md:text-xl xl:text-3xl leading-relaxed sm:leading-relaxed md:leading-relaxed xl:leading-relaxed font-bold">Аподейктика индуктивно подчеркивает катарсис, однако Зигварт считал критерием истинности необходимость и&nbsp;общезначимость, для&nbsp;которых нет никакой опоры в&nbsp;объективном мире <a href="#" class="text-orange hover:opacity-75">подробнее</a></h2>
                    </div>
                </div>
            </div>
        </section>
        <section class="pb-4 px-6">
            <p class="inline-block text-3xl text-black font-bold mb-4">Модели недели</p>
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/pictures/car_cerato.png" alt="Cerato"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Cerato</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">1 221 900 ₽</span><span class="inline-block line-through pl-6 text-gray-400">1 821 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/pictures/car_rio-x.png" alt="Rio X"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Rio X</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">969 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/pictures/car_mohave_new.png" alt="Mohave"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">Mohave</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">3 549 900 ₽</span>
                        </p>
                    </div>
                </div>
                <div class="bg-white w-full border border-gray-100 rounded overflow-hidden shadow-lg hover:shadow-2xl pt-4">
                    <a class="block w-full h-40" href="detail.html"><img class="w-full h-full hover:opacity-90 object-cover" src="/pictures/car_K5-half.png" alt="K5"></a>
                    <div class="px-6 py-4">
                        <div class="text-black font-bold text-xl mb-2"><a class="hover:text-orange" href="detail.html">K5</a></div>
                        <p class="text-grey-darker text-base">
                            <span class="inline-block">1 577 900 ₽</span>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <x-panels.news :articles="$articles"/>

@endsection