@props(['active'])

@php
$classes = ($active ?? false)
            ? 'p-2 flex items-center text-sm font-semibold text-primary rounded-md bg-white/90 focus:outline-none focus:border focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'p-2 flex items-center text-sm font-semibold text-white rounded-md hover:text-primary hover:bg-white/90 md:hover:text-gray-200 md:hover:bg-transparent focus:outline-none focus:text-gray-700 focus:border focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
