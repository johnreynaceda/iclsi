@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'inline-flex items-center px-1 pt-1 relative after:absolute after:bottom-0 after:left-0 after:w-full after:rounded-t-xl after:bg-white  after:h-1.5 text-sm font-medium leading-5 text-gray-700 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent  font-medium leading-5 text-white hover:text-gray-700 hover:border-white focus:outline-none focus:text-gray-700 focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
