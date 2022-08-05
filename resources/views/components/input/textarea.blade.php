@props(['name','value','errorExists'])

@if ($errorExists)
    <textarea id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full rounded-md border-red-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{ old($name, $value) }}</textarea>
@else
    <textarea id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{ old($name, $value) }}</textarea>
@endif