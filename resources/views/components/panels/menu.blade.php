@php
$categoryRepository = app(\App\Repositories\Contracts\CategoriesRepositoryContract::class);
$categories = $categoryRepository->getAllCategories();
if (Route::currentRouteName() == "cars.index") {
    $activeCategories = $categoryRepository->getActiveCategories($_SERVER['REQUEST_URI']);
} else {
    $activeCategories =collect([]);
}
@endphp

<nav class="order-1">
    <ul class="block lg:flex">
        @foreach ($categories as $category)
        <li class="group">
            @if ($category->childrenCategories->isNotEmpty())
                @if($activeCategories->contains($category->slug))
                    <a class="inline-block p-4 text-orange font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{ route('cars.index', $category) }}">
                @else
                    <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{ route('cars.index', $category) }}">
                @endif
                {{ $category->name }}
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </a>
            <ul class="dropdown-navigation-submenu absolute hidden group-hover:block bg-white shadow-lg">
                @foreach ($category->childrenCategories as $childrenCategory)
                    @if($activeCategories->contains($childrenCategory->slug))
                        <li><a class="block py-2 px-4 text-orange hover:text-orange hover:bg-gray-100" href="{{ route('cars.index', $childrenCategory) }}">{{ $childrenCategory->name }}</a></li>
                    @else
                        <li><a class="block py-2 px-4 text-black hover:text-orange hover:bg-gray-100" href="{{ route('cars.index', $childrenCategory) }}">{{ $childrenCategory->name }}</a></li>
                    @endif
                @endforeach
            </ul>
            @else
            @if($activeCategories->contains($category->slug))
                    <a class="inline-block p-4 text-orange font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{ route('cars.index', $category) }}">
                @else
                    <a class="inline-block p-4 text-black font-bold border-l border-r border-transparent group-hover:text-orange group-hover:bg-gray-100 group-hover:border-l group-hover:border-r group-hover:border-gray-200 group-hover:shadow" href="{{ route('cars.index', $category) }}">
                @endif
                {{ $category->name }}
            </a>
            @endif
        </li>
        @endforeach
    </ul>
</nav>