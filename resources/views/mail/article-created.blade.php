@component('mail::message')
# Создана новая новость: {{ $article->title }}

@component('mail::button', ['url' => 'articles/' . $article->slug])
Перейти к новости
@endcomponent

@endcomponent
