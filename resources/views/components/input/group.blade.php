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
    @if ($error == "validation.min.string")
        <span class="text-xs italic text-red-600">Слишком короткое значение</span>
    @endif
    @if ($error == "validation.confirmed")
        <span class="text-xs italic text-red-600">Не подтвержден</span>
    @endif
    @if ($error == "validation.email")
        <span class="text-xs italic text-red-600">Значение электронной почты некорректно</span>
    @endif
    @if ($error == "auth.failed")
        <span class="text-xs italic text-red-600">Неверный логин или пароль</span>
    @endif
@endforeach