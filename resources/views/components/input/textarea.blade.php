@props(['name','value','errorExists'])

<textarea id="{{ $name }}" name="{{ $name }}" class="mt-1 block w-full rounded-md @if ($errorExists) border-red-600 @else border-gray-300 @endif shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" rows="3">{{ old($name, $value) }}</textarea>