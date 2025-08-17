@props(['href', 'current' => false])

@php
    $classes = $current
        ? 'bg-blue-700 text-white md:bg-transparent md:text-blue-700 md:dark:text-blue-500'
        : 'text-gray-900 hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent';
@endphp

<a href="{{ $href }}"
   {{ $attributes->merge(['class' => 'block py-2 px-3 rounded-sm md:p-0 ' . $classes, 'aria-current' => $current ? 'page' : null]) }}>
    {{ $slot }}
</a>
