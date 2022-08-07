@extends('layouts.app')

@section('main')
    <x-panels.nav/>
    <main class="flex-1 container mx-auto bg-white">
        @yield('content')
    </main>
@endsection