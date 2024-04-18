@props(['post'])

<div {{ $attributes }}>
    <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
        <a href="#" class="flex flex-wrap no-underline hover:no-underline" wire:navigate href="{{ route('posts.show', $post->slug) }}">
            <img src="{{ $post->getThumbnailUrl() }}" class="h-64 w-full rounded-t pb-6">
            <a wire:navigate href="{{ route('posts.show', $post->slug) }}" class="w-full text-gray-600 text-xs md:text-sm px-6">{{ $post->title }}</a>
            <div class="w-full font-bold text-xl text-gray-900 px-6">{{ $post->title }}</div>
            <p class="text-gray-800 font-serif text-base px-6 mb-5">
                {{ $post->getExcerpt() }}
            </p>
        </a>
    </div>
    <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
        <div class="flex items-center justify-between">
            <x-posts.author-index :author="$post->author" size="xs" />
            <p class="text-gray-600 text-xs md:text-sm">{{ $post->getReadingTime() }} min read</p>
        </div>
    </div>

    {{-- <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow-lg">
    <a class="flex flex-wrap no-underline hover:no-underline" wire:navigate href="{{ route('posts.show', $post->slug) }}">
            <img class="h-64 w-full rounded-t pb-6" src="{{ $post->getThumbnailUrl() }}">
            <a wire:navigate href="{{ route('posts.show', $post->slug) }}"
                class="text-xl font-bold text-gray-900">{{ $post->title }}</a>
            </a>
    </div>
    <div class="mt-3">
        <div class="flex-none mt-auto bg-white rounded-b rounded-t-none overflow-hidden shadow-lg p-6">
            <div class="flex items-center justify-between">
                @if ($category = $post->categories->first())
                    <x-posts.category-badge :category="$category" />
                 @endif
                 <p class="text-gray-600 text-xs md:text-sm">{{ $post->published_at }}</p>
            </div>
        </div>
    </div> --}}
</div>
