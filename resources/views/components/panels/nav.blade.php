@props(['route','value'])

@if(isset($value))
    {{ Breadcrumbs::render($route, $value) }}
@else
    {{ Breadcrumbs::render($route) }}
@endif