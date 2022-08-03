@props(['for','title','errors'])

<label for="{{ $for }}" class="text-gray-700 font-bold">{{ $title }}</label>
{{ $slot }}
@foreach ($errors->get($for) as $error)
    @if ($error == "validation.required")
        <span class="text-xs italic text-red-600">Поле не заполнено</span>
    @endif
    @if ($error == "validation.unique")
        <span class="text-xs italic text-red-600">Новость с таким названием уже существует</span>
    @endif
    @if ($error == "validation.max.string")
        <span class="text-xs italic text-red-600">Слишком длинное значение</span>
    @endif
@endforeach