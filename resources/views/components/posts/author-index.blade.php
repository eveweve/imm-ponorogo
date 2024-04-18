@props(['author', 'size'])

@php

    $imageSize = match ($size ?? null) {
        'xs' => 'w-7 h-7',
        'sm' => 'w-9 h-9',
        'md' => 'w-10 h-10',
        'lg' => 'w-14 h-14',
        default => 'w-10 h-10',
    };

@endphp

<img class="mr-3 rounded-full {{ $imageSize }}" src="{{ $author->profile_photo_url }}" alt="{{ $author->name }}">
