@props(['name','placeholder','value','errorExists'])

@if ($errorExists)
    <input id="{{ $name }}" name="{{ $name }}" type="text" value="{{ old($name, $value) }}" class="mt-1 block w-full rounded-md border-red-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Введите заголовок">
@else
    <input id="{{ $name }}" name="{{ $name }}" type="text" value="{{ old($name, $value) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Введите заголовок">
@endif