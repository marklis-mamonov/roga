@props(['name','placeholder','value'])

<input id="{{ $name }}" name="{{ $name }}" type="text" value="{{ old($name, $value) }}" class="mt-1 block w-full rounded-md <?= ($errors->has('title')) ? 'border-red-600' : 'border-gray-300' ?> shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" placeholder="Введите заголовок">