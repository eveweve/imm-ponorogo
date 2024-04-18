<nav class="flex items-center justify-between py-6 px-8 border-b border-gray-200" x-data="{navbarOpen:false}">
    <div id="nav-left" class="flex items-center gap-4">
        <a href="{{ route('home') }}">
            <x-application-mark />
            @include('layouts.partials.menu.partials.hamburger')
        </a>
         {{-- side bar mobile menu --}}
        <div class="fixed h-full w-screen lg:hidden bg-black/50 backdrop-blur-sm top-0 right-0 " :class="{'hidden':!navbarOpen, 'flex':navbarOpen}">
                <div class="text-gray-800 font-semibold bg-white flex-col absolute left-0 top-0 h-screen p-8 gap-8 z-50 w-56 flex">
                    <a class="text-gray-600 font-semibold bg-white py-2 px-2 items center rounded-xl shadow-lg text-sm inline-flex " @click = "navbarOpen = !navbarOpen"><strong class="ml-2 mr-1 text-sm">(X)</strong> close</a>
                    <x-res-navigation-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                        {{ __('menu.home') }}
                    </x-res-navigation-link>
                    <x-res-navigation-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                        {{ __('menu.blog') }}
                    </x-res-navigation-link>
                    <x-res-navigation-link href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
                        {{ __('menu.blog') }}
                    </x-res-navigation-link>
                </div>
            </div>
            <div class="lg:flex space-x-4 ml-4 hidden">
                <x-nav-link class="" href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('menu.home') }}
                </x-nav-link>
                <x-nav-link href="{{ route('posts.index') }}" :active="request()->routeIs('posts.index')">
                    {{ __('menu.blog') }}
                </x-nav-link>
                <x-nav-link href="{{ route('events.index') }}" :active="request()->routeIs('events.index')">
                    {{ __('menu.events') }}
                </x-nav-link>
            </div>

        </div>
    <div id="nav-right" class="sm:flex items-center md:space-x-6 mx-2">
        @auth
            @include('layouts.partials.header-right-auth')
        @else
            @include('layouts.partials.header-right-guest')
        @endauth
    </div>
</nav>
