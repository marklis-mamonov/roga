@extends('layouts.app')

@section('main')
    <x-panels.nav/>
    <main class="flex-1 container mx-auto bg-white">
        <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">
            <x-panels.sidemenu/>
            @yield('content')
        </div>
    </main>
@endsection