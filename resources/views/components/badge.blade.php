@props(['textColor', 'bgColor'])

@php
    $textColor = match ($textColor) {
        'gray' => 'text-gray-800',
        'blue' => 'text-blue-800',
        'red' => 'text-red-800',
        'yellow' => 'text-yellow-800',
        'pink' => 'text-pink-800',
        'indigo' => 'text-indigo-800',
        'purple' => 'text-purple-800',
        'green' => 'text-green-800',
        'white' => 'text-white',
        'black' => 'text-black',
        'lime' => 'text-lime-800',
        default => 'text-white',
    };

    $bgColor = match ($bgColor) {
        'gray' => 'bg-gray-100',
        'blue' => 'bg-blue-100',
        'red' => 'bg-red-500',
        'yellow' => 'bg-yellow-100',
        'pink' => 'bg-pink-100',
        'indigo' => 'bg-indigo-100',
        'purple' => 'bg-purple-100',
        'white' => 'bg-white',
        'black' => 'bg-black',
        'green' => 'bg-green-100',
        'lime' => 'bg-lime-100',
        default => 'bg-red-500',
    };
@endphp

<button {{ $attributes }} class="{{ $textColor }} {{ $bgColor }} rounded-xl px-3 py-1 text-base shadow-lg">
    {{ $slot }} </button>
