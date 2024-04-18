<div class=" px-3 lg:px-7 py-6">
    <div class="xl:flex justify-between items-center border-b border-gray-100 ms:grid ms:grid-cols-2">
        <div class="text-gray-600">
            <div class="flex items-center space-x-4">
                @include('posts.partials.search-box')
            </div>
        </div>
        <div class="flex items-center space-x-4 font-light px-5">
            <div class="flex item-center">
                {{-- @if ($this->activeCategory || $search)
                <button class="mr-3 text-xs gray-500" wire:click="clearFilters()">X</button>
                @endif --}}
                @if ($this->activeCategory)
                <x-badge wire:navigate href="{{ route('posts.index', ['category' => $this->activeCategory->slug]) }}"
                    :textColor="$this->activeCategory->text_color" :bgColor="$this->activeCategory->bg_color">
                    {{ $this->activeCategory->title }}
                </x-badge>
                @endif
                @if ($search)
                <span class="ml-2 bg-white shadow-lg rounded-xl px-3 py-1">
                    containing : <strong class="flex-auto">{{ $search }}</strong>
                </span>
                @endif
            </div>

            <button class="{{ $sort === 'desc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4"
                wire:click="setSort('desc')">Latest</button>
            <button class="{{ $sort === 'asc' ? 'text-red-500 border-b border-red-900' : 'text-gray-500' }} py-4 "
                wire:click="setSort('asc')">Oldest</button>
            {{-- <svg fill="#000000" viewBox="-1.6 -1.6 19.20 19.20" xmlns="http://www.w3.org/2000/svg" transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <path d="M0 3.7L11 3.7 11 2.3 0 2.3 0 3.7zM13 0C12.4477153 0 12 .44771525 12 1L12 5C12 5.55228475 12.4477153 6 13 6 13.5522847 6 14 5.55228475 14 5L14 1C14 .44771525 13.5522847 0 13 0zM7 8.3L7 7C7 6.44771525 6.55228475 6 6 6 5.44771525 6 5 6.44771525 5 7L5 11C5 11.5522847 5.44771525 12 6 12 6.55228475 12 7 11.5522847 7 11L7 9.7 14 9.7 14 8.3 7 8.3zM0 9.7L4 9.7 4 8.3 0 8.3 0 9.7z" transform="translate(1 2)"></path> </g> </g></svg>> --}}

            <x-dropdown>
                <x-slot name="trigger">
                    <button>
                        <svg wire:loading.delay aria-hidden="true"
                            class="w-6 h-6 text-gray-200 animate-spin dark:text-gray-600 fill-red-600"
                            viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                fill="currentColor" />
                            <path
                                d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                fill="currentFill" />
                        </svg>

                        <svg wire:loading.delay.remove xmlns="http://www.w3.org/2000/svg" fill="white"
                            transform="rotate(0)matrix(-1, 0, 0, 1, 0, 0)" viewBox="0 0 16 16" stroke-width="0.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500  hover:text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M0 3.7L11 3.7 11 2.3 0 2.3 0 3.7zM13 0C12.4477153 0 12 .44771525 12 1L12 5C12 5.55228475 12.4477153 6 13 6 13.5522847 6 14 5.55228475 14 5L14 1C14 .44771525 13.5522847 0 13 0zM7 8.3L7 7C7 6.44771525 6.55228475 6 6 6 5.44771525 6 5
                                6.44771525 5 7L5 11C5 11.5522847 5.44771525 12 6 12 6.55228475 12
                                7 11.5522847 7 11L7 9.7 14 9.7 14 8.3 7 8.3zM0 9.7L4 9.7 4 8.3 0 8.3 0 9.7z"
                                transform="translate(1 2)" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link>
                        <x-label>
                            <x-checkbox wire:model.live="popular" />
                            Popular
                        </x-label>
                    </x-dropdown-link>
                </x-slot>
            </x-dropdown>
        </div>

    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
        <x-posts.post-item wire:key="{{$post->id}}" :post="$post" />
        @endforeach
    </div>
    <div class="">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
