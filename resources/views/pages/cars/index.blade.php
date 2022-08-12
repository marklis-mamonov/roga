@extends('layouts.cards')

@section('title', 'Каталог')

@section('content')

<div class="p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Каталог</h1>
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-6">
            @foreach ($cars as $car)
                <x-panels.cars.item :car="$car"/>
            @endforeach

        </div>
        <div class="text-center mt-4">
            {{ $cars->onEachSide(1)->links() }}
        </div>
    </div>
</div>

@endsection