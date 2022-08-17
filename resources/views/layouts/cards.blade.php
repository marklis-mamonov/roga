@extends('layouts.app')

@section('main')
    @if(isset($category))
        <x-panels.nav :route="Route::getFacadeRoot()->current()->uri()" :value="$category"/>
    @elseif(isset($car))
        <x-panels.nav :route="Route::getFacadeRoot()->current()->uri()" :value="$car"/>
    @else
        <x-panels.nav :route="Route::getFacadeRoot()->current()->uri()"/>
    @endif
    <main class="flex-1 container mx-auto bg-white">
        @yield('content')
    </main>
@endsection