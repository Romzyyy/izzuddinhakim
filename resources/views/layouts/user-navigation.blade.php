<nav x-cloak x-data="{ open: false }" :class="{ 'dark': darkMode === true }"
    class="border-b border-gray-100 dark:border-gray-700 bg-white dark:bg-gray-950 antialiased fixed top-0 z-50 w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-12">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('index') }}" class="font-bold text-2xl text-gray-800 dark:text-gray-200">
                        @if ($summaries->isNotEmpty())
                            {{ ucfirst(explode(' ', strip_tags($summaries->get(0)->name))[0]) }}
                        @else
                            Izzuddin
                        @endif
                    </a>
                </div>
            </div>
            <div class="hidden space-x-10 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('index')" :active="request()->routeIs('index')">
                    {{ __('Home') }}
                </x-nav-link>
                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                    {{ __('About') }}
                </x-nav-link>
                <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                    {{ __('Blog') }}
                </x-nav-link>
                <x-nav-link :href="route('academia')" :active="request()->routeIs('academia')">
                    {{ __('Academia') }}
                </x-nav-link>
                <x-nav-link :href="route('event')" :active="request()->routeIs('event')">
                    {{ __('Event') }}
                </x-nav-link>
                <x-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                    {{ __('Contact') }}
                </x-nav-link>
                <x-theme-toggle />
            </div>

            <div class="-me-2 flex items-center gap-2 sm:hidden ">
                <x-theme-toggle />
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('event')" :active="request()->routeIs('event')">
                {{ __('Event') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('academia')" :active="request()->routeIs('academia')">
                {{ __('Academia') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
