<!doctype html>
<html class="antialiased" lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <x-panels.styles/>
    <x-panels.scripts/>    

    <title>Рога и Сила - Главная страница</title>
    <link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
</head>
<body class="bg-white text-gray-600 font-sans leading-normal text-base tracking-normal flex min-h-screen flex-col">
<div class="wrapper flex flex-1 flex-col">
    <x-panels.header/>

        @yield('content')

    <x-panels.footer/>
</div>

</body>
</html>