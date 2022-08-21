@extends('layouts.inner')

@section('title', 'Салоны')

@section('content')

<div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
    <h1 class="text-black text-3xl font-bold mb-4">Салоны</h1>
        <div class="space-y-4 max-w-4xl">
            @if ($salons)
                @foreach ($salons as $salon)
                    <x-panels.salons.item :salon="$salon" :index="$loop->index"/>
                @endforeach
            @endif
        </div>
    </div>
</div>

@endsection