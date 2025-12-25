<header class="sticky top-0 z-50 w-full">
    <!-- Skip to main content link for accessibility -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-2 focus:left-2 z-50 rounded-md bg-blue-600 px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-blue-500">
        Skip to main content
    </a>

    <!-- Top Navigation Bar -->
    <nav class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">
        <div class="mx-auto flex max-w-screen-xl flex-wrap items-center justify-between gap-4 p-4">
            <!-- Logo -->
            <a
                href="{{ route('frontend.index') }}"
                wire:navigate
                class="flex items-center gap-3 rtl:gap-x-reverse"
                aria-label="Go to homepage">
                <img
                    class="h-9"
                    src="{{ asset('img/logo-desa.webp') }}"
                    alt="{{ app_name() }} Logo" />
                <span class="self-center whitespace-nowrap text-xl font-semibold text-gray-900 dark:text-white">
                    {{ app_name() }}<span class="text-blue-600">.</span>
                </span>
            </a>

            <!-- Social Media & Search Section -->
            <div class="flex items-center gap-6">
                <!-- Social Media Links -->
                <div class="hidden items-center gap-4 lg:flex">
                    @if (setting('social_facebook'))
                    <a
                        href="{{ setting('social_facebook') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 hover:text-blue-600 dark:text-gray-400 dark:hover:text-blue-500"
                        aria-label="Facebook">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </a>
                    @endif

                    @if (setting('social_twitter'))
                    <a
                        href="{{ setting('social_twitter') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 hover:text-blue-400 dark:text-gray-400 dark:hover:text-blue-400"
                        aria-label="Twitter">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                    @endif

                    @if (setting('social_instagram'))
                    <a
                        href="{{ setting('social_instagram') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 hover:text-pink-600 dark:text-gray-400 dark:hover:text-pink-500"
                        aria-label="Instagram">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    @endif

                    @if (setting('social_youtube'))
                    <a
                        href="{{ setting('social_youtube') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 hover:text-red-600 dark:text-gray-400 dark:hover:text-red-500"
                        aria-label="YouTube">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z" />
                        </svg>
                    </a>
                    @endif

                    @if (setting('social_linkedin'))
                    <a
                        href="{{ setting('social_linkedin') }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="text-gray-500 hover:text-blue-700 dark:text-gray-400 dark:hover:text-blue-600"
                        aria-label="LinkedIn">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4.98 3.5c0 1.381-1.11 2.5-2.48 2.5s-2.48-1.119-2.48-2.5c0-1.38 1.11-2.5 2.48-2.5s2.48 1.12 2.48 2.5zm.02 4.5h-5v16h5v-16zm7.982 0h-4.968v16h4.969v-8.399c0-4.67 6.029-5.052 6.029 0v8.399h4.988v-10.131c0-7.88-8.922-7.593-11.018-3.714v-2.155z" />
                        </svg>
                    </a>
                    @endif
                </div>

                <!-- Search Form -->
                <form action="" method="GET" class="hidden lg:block">
                    <div class="relative">
                        <input
                            type="search"
                            name="q"
                            value="{{ request('q') }}"
                            placeholder="{{ __('Search...') }}"
                            class="w-64 rounded-lg border border-gray-300 bg-gray-50 py-2 pl-4 pr-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            aria-label="Search" />
                        <button
                            type="submit"
                            class="absolute inset-y-0 right-0 flex items-center pr-3"
                            aria-label="Submit search">
                            <svg
                                class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                    </div>
                </form>

                <!-- Right Side Actions -->
                <div class="flex items-center gap-4">
                    <!-- Theme Toggle -->
                    <button
                        class="rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none dark:text-white dark:hover:bg-gray-700"
                        id="theme-toggle"
                        type="button"
                        aria-label="Toggle between light and dark theme"
                        aria-pressed="false">
                        <svg
                            class="hidden h-5 w-5"
                            id="theme-toggle-dark-icon"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg
                            class="hidden h-5 w-5"
                            id="theme-toggle-light-icon"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                                fill-rule="evenodd"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>

                    <!-- Language Dropdown dengan Alpine.js -->
                    <div x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            @click.away="open = false"
                            class="inline-flex cursor-pointer items-center justify-center rounded-sm p-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            type="button"
                            aria-label="Select language"
                            :aria-expanded="open">
                            <svg
                                class="h-5 w-5"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 5h7" />
                                <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
                                <path d="M5 9c0 2.144 2.952 3.908 6.7 4" />
                                <path d="M12 20l4 -9l4 9" />
                                <path d="M19.1 18h-6.2" />
                            </svg>
                            <span class="ms-2 hidden sm:block">
                                {{ strtoupper(app()->currentLocale()) }}
                            </span>
                        </button>

                        <!-- Dropdown Menu -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 divide-y divide-gray-100 rounded-lg bg-white shadow-lg dark:bg-gray-700"
                            role="menu"
                            aria-label="Language selection menu">
                            <ul class="py-2 text-sm" role="none">
                                @foreach (config('app.available_locales') as $locale_code => $locale_name)
                                <li>
                                    <a
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        href="{{ route('language.switch', $locale_code) }}"
                                        role="menuitem">
                                        {{ $locale_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- User Dropdown dengan Alpine.js -->
                    @auth
                    <div x-data="{ open: false }" class="relative">
                        <button
                            @click="open = !open"
                            @click.away="open = false"
                            class="inline-flex cursor-pointer items-center justify-center rounded-lg px-2 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                            type="button"
                            aria-label="User menu"
                            :aria-expanded="open">
                            <img
                                class="h-8 w-8 rounded-full object-cover"
                                src="{{ asset(Auth::user()->avatar) }}"
                                alt="{{ Auth::user()->name }}'s profile picture" />
                            <span class="ms-2 hidden sm:block">
                                {{ Auth::user()->last_name }}
                            </span>
                        </button>

                        <!-- User Dropdown Menu -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-50 mt-2 w-48 divide-y divide-gray-100 rounded-lg bg-white shadow-lg dark:bg-gray-700"
                            role="menu"
                            aria-label="User account menu">
                            <ul class="py-2 text-sm" role="none">
                                @can('view_backend')
                                <li class="border-b-2 border-gray-200 dark:border-gray-600">
                                    <a
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        href="{{ route('backend.dashboard') }}"
                                        role="menuitem"
                                        wire:navigate>
                                        <div class="inline-flex items-center">
                                            <svg
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-layout-dashboard"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M5 4h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                                <path
                                                    d="M5 16h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                                <path
                                                    d="M15 12h4a1 1 0 0 1 1 1v6a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-6a1 1 0 0 1 1 -1" />
                                                <path
                                                    d="M15 4h4a1 1 0 0 1 1 1v2a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1v-2a1 1 0 0 1 1 -1" />
                                            </svg>
                                            {{ __('Admin Dashboard') }}
                                        </div>
                                    </a>
                                </li>
                                @endcan

                                <li>
                                    <a
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        href="{{ route('frontend.users.profile') }}"
                                        role="menuitem"
                                        wire:navigate>
                                        <div class="inline-flex items-center">
                                            <svg
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-user-bolt me-2"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4c.267 0 .529 .026 .781 .076" />
                                                <path d="M19 16l-2 3h4l-2 3" />
                                            </svg>
                                            {{ Auth::user()->name }}
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        href="{{ route('frontend.users.profileEdit') }}"
                                        role="menuitem"
                                        wire:navigate>
                                        <div class="inline-flex items-center">
                                            <svg
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-settings-cog me-2"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M12.003 21c-.732 .001 -1.465 -.438 -1.678 -1.317a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c.886 .215 1.325 .957 1.318 1.694" />
                                                <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                                <path d="M19.001 15.5v1.5" />
                                                <path d="M19.001 21v1.5" />
                                                <path d="M22.032 17.25l-1.299 .75" />
                                                <path d="M17.27 20l-1.3 .75" />
                                                <path d="M15.97 17.25l1.3 .75" />
                                                <path d="M20.733 20l1.3 .75" />
                                            </svg>
                                            {{ __('Settings') }}
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        href="{{ route('logout') }}"
                                        role="menuitem"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <div class="inline-flex items-center">
                                            <svg
                                                class="icon icon-tabler icons-tabler-outline icon-tabler-logout me-2"
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="24"
                                                height="24"
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                                                <path d="M9 12h12l-3 -3" />
                                                <path d="M18 15l3 -3" />
                                            </svg>
                                            {{ __('Logout') }}
                                        </div>
                                    </a>
                                </li>
                                <form id="logout-form" class="hidden" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                </form>
                            </ul>
                        </div>
                    </div>
                    @endauth

                    <!-- Mobile Menu Toggle dengan Alpine.js -->
                    <div x-data="{ open: false }">
                        <button
                            @click="open = !open"
                            class="inline-flex h-10 w-10 items-center justify-center rounded-lg p-2 text-sm text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 md:hidden dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                            type="button"
                            :aria-expanded="open"
                            aria-label="Toggle navigation menu">
                            <span class="sr-only">Open main menu</span>
                            <svg
                                class="h-5 w-5"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 17 14">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M1 1h15M1 7h15M1 13h15" />
                            </svg>
                        </button>

                        <!-- Mobile Menu -->
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="opacity-0 scale-95"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-95"
                            class="w-full md:hidden"
                            id="navbar-menu">
                            <div class="space-y-1 py-3">
                                <!-- Mobile Search -->
                                <form action="" method="GET" class="mb-4">
                                    <div class="relative">
                                        <input
                                            type="search"
                                            name="q"
                                            value="{{ request('q') }}"
                                            placeholder="{{ __('Search...') }}"
                                            class="w-full rounded-lg border border-gray-300 bg-gray-50 py-2 pl-4 pr-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                            aria-label="Search" />
                                        <button
                                            type="submit"
                                            class="absolute inset-y-0 right-0 flex items-center pr-3"
                                            aria-label="Submit search">
                                            <svg
                                                class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </button>
                                    </div>
                                </form>

                                <x-frontend.dynamic-menu location="frontend-header" />

                                @guest
                                <div class="space-y-1 border-t border-gray-200 pt-3 dark:border-gray-700">
                                    <a
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700"
                                        href="{{ route('login') }}"
                                        wire:navigate>
                                        {{ __('Login') }}
                                    </a>
                                    @if (user_registration())
                                    <a
                                        class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700"
                                        href="{{ route('register') }}"
                                        wire:navigate>
                                        {{ __('Register') }}
                                    </a>
                                    @endif
                                </div>
                                @endguest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Bottom Navigation Menu Bar -->
    <nav class="border-y border-gray-200 bg-gray-50 dark:border-gray-700 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 py-3">
            <div class="flex items-center">
                <!-- Desktop Menu -->
                <div class="hidden md:block">
                    <x-frontend.dynamic-menu location="frontend-header" />
                </div>

                <!-- Mobile Menu -->
                <div class="hidden w-full md:hidden" id="navbar-menu">
                    <div class="space-y-1 py-3">
                        <!-- Mobile Search -->
                        <form action="" method="GET" class="mb-4">
                            <div class="relative">
                                <input
                                    type="search"
                                    name="q"
                                    value="{{ request('q') }}"
                                    placeholder="{{ __('Search...') }}"
                                    class="w-full rounded-lg border border-gray-300 bg-gray-50 py-2 pl-4 pr-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400"
                                    aria-label="Search" />
                                <button
                                    type="submit"
                                    class="absolute inset-y-0 right-0 flex items-center pr-3"
                                    aria-label="Submit search">
                                    <svg
                                        class="h-5 w-5 text-gray-500 dark:text-gray-400"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </button>
                            </div>
                        </form>

                        <x-frontend.dynamic-menu location="frontend-header" />

                        @guest
                        <div class="space-y-1 border-t border-gray-200 pt-3 dark:border-gray-700">
                            <a
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700"
                                href="{{ route('login') }}"
                                wire:navigate>
                                {{ __('Login') }}
                            </a>
                            @if (user_registration())
                            <a
                                class="block rounded-md px-3 py-2 text-base font-medium text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-700"
                                href="{{ route('register') }}"
                                wire:navigate>
                                {{ __('Register') }}
                            </a>
                            @endif
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>