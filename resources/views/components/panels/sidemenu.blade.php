<aside class="hidden sm:block col-span-1 border-r p-4">
    <nav>
        <ul class="text-sm">
            <li>
                <p class="text-xl text-black font-bold mb-4">Информация</p>
                <ul class="space-y-2">
                    <li><a class="<?=(Route::is('about_us')) ? "text-orange cursor-default" : "hover:text-orange" ?>" href="{{ route('about_us') }}">О компании</a></li>
                    <li><a class="<?=(Route::is('contacts')) ? "text-orange cursor-default" : "hover:text-orange" ?>" href="{{ route('contacts') }}">Контактная информация</a></li>
                    <li><a class="<?=(Route::is('conditions')) ? "text-orange cursor-default" : "hover:text-orange" ?>" href="{{ route('conditions') }}">Условия продаж</a></li>
                    <li><a class="<?=(Route::is('finance_department')) ? "text-orange cursor-default" : "hover:text-orange" ?>" href="{{ route('finance_department') }}">Финансовый отдел</a></li>
                    <li><a class="<?=(Route::is('for_clients')) ? "text-orange cursor-default" : "hover:text-orange" ?>" href="{{ route('for_clients') }}">Для клиентов</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>