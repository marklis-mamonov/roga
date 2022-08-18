@component('mail::message')
# Редактирована новость: {{ $article->title }}

@component('mail::button', ['url' => 'articles/' . $article->slug])
Перейти к новости
@endcomponent

@endcomponent
