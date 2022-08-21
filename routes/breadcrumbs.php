<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('homepage', function (BreadcrumbTrail $trail) {
    $trail->push('Главная', route('homepage'));
});

Breadcrumbs::for('about_us', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('О компании', route('about_us'));
});

Breadcrumbs::for('contacts', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Контактная информация', route('contacts'));
});

Breadcrumbs::for('conditions', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Условия продаж', route('conditions'));
});

Breadcrumbs::for('finance_department', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Финансовый отдел', route('finance_department'));
});

Breadcrumbs::for('for_clients', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Для клиентов', route('for_clients'));
});

Breadcrumbs::for('articles', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Новости', route('articles.index'));
});

Breadcrumbs::for('articles/{article}', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('articles');
    $trail->push($article->title, route('articles.show', $article));
});

Breadcrumbs::for('catalog/{category}', function (BreadcrumbTrail $trail, $category) {
    $trail->parent('homepage');
    if ($category->ancestors) {
        foreach ($category->ancestors as $ancestor) {
            $trail->push($ancestor->name, $ancestor->slug);
        }
    }
    $trail->push($category->name, route('cars.index', $category));
});

Breadcrumbs::for('products/{car}', function (BreadcrumbTrail $trail, $car) {
    $trail->parent('catalog/{category}', $car->category);
    $trail->push($car->name, route('cars.show', $car));
});

Breadcrumbs::for('salons', function (BreadcrumbTrail $trail) {
    $trail->parent('homepage');
    $trail->push('Салоны', route('salons'));
});
