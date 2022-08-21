<footer class="container mx-auto">
    <section class="block sm:flex bg-white px-4 sm:px-8 py-4">
        <div class="flex-1">
            <x-panels.salons/>
        </div>
        <div class="mt-8 border-t sm:border-t-0 sm:mt-0 sm:border-l py-2 sm:pl-4 sm:pr-8">
            <p class="text-3xl text-black font-bold mb-4">Информация</p>
            <nav>
                <ul class="list-inside  bullet-list-item">
                    <li><a class="<?=(Route::is('about_us')) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange" ?>" href="{{ route('about_us') }}">О компании</a></li>
                    <li><a class="<?=(Route::is('contacts')) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange" ?>" href="{{ route('contacts') }}">Контактная информация</a></li>
                    <li><a class="<?=(Route::is('conditions')) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange" ?>" href="{{ route('conditions') }}">Условия продаж</a></li>
                    <li><a class="<?=(Route::is('finance_department')) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange" ?>" href="{{ route('finance_department') }}">Финансовый отдел</a></li>
                    <li><a class="<?=(Route::is('for_clients')) ? "text-orange cursor-default" : "text-gray-600 hover:text-orange" ?>" href="{{ route('for_clients') }}">Для клиентов</a></li>
                </ul>
            </nav>
        </div>
    </section>


    <div class="space-y-4 sm:space-y-0 sm:flex sm:justify-between items-center py-6 px-2 sm:px-0">
        <div class="copy pr-8">© 2021 Рога &amp; Сила. Продажа автомобилей.</div>
        <div class="text-right">
            <a href="https://www.qsoft.ru" target="_blank" class="inline-block">Сделано в <img class="ml-2 inline-block" src="/images/qsoft.png" width="59" height="11" alt=""/></a>
        </div>
    </div>
</footer>