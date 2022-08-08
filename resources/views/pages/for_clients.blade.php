@extends('layouts.inner')

@section('title', 'Для клиентов')

@section('content')

    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Для клиентов</h1>
        
        <div class="space-y-4">
            <p>Средняя цена моделей</p>
            <p>@dump($carPriceAvg)</p>
            <p>Средняя цена моделей со скидкой</p>
            <p>@dump($carPriceDiscountAvg)</p>
            <p>Самая дорогая модель</p>
            <p>@dump($carMaxPrice)</p>
            <p>Все виды салонов автомобилей</p>
            <p>@dump($carSalons)</p>
            <p>Названия двигателей, отсортированных по алфавиту</p>
            <p>@dump($carEngines)</p>
            <p>Названия классов моделей, отсортированных по алфавиту</p>
            <p>@dump($carClasses)</p>
            <p>Модели со скидкой, в названии моделей, в названии их двигателей или КПП которых, содержаться цифра 5 или 6</p>
            <p>@dump($carWith5or6)</p>
            <p>Коллекция всех видов кузовов, отсортированных по возрастанию средней цены</p>
            <p>@dump($carBodyPriceAvg)</p>
        </div>
    </div>
        
@endsection