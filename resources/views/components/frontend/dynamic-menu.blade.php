@props(['location', 'cssClass' => 'flex flex-col gap-2 md:flex-row md:gap-8', 'itemComponent' => null])

@php
    $menuItems = \Modules\Menu\Models\MenuItem::query()
        ->whereHas('menu', function ($query) use ($location) {
            $query->where('location', $location)->where('is_active', true);
        })
        ->with([
            'children' => function ($query) {
                $query->where('is_active', true)->orderBy('sort_order');
            },
        ])
        ->whereNull('parent_id')
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->get();
@endphp

@if ($menuItems->isNotEmpty())
    <ul class="{{ $cssClass }}">
        @foreach ($menuItems as $menuItem)
            @if ($menuItem->children->isEmpty())
                <li>
                    <a
                        href="{{ $menuItem->getFullUrl() }}"
                        @if ($menuItem->opens_new_tab) target="_blank" @else target="_self" @endif
                        class="block rounded px-3 py-2 text-gray-700 hover:bg-gray-50 md:hover:bg-transparent md:hover:text-blue-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        @if ($menuItem->route_name) wire:navigate @endif>
                        @if ($menuItem->icon)
                            <i class="{{ $menuItem->icon }} me-2"></i>
                        @endif
                        {{ $menuItem->name }}
                        @if ($menuItem->badge_text)
                            <span class="ms-2 rounded-full px-2 py-1 text-xs {{ $menuItem->badge_color ?? 'bg-blue-100 text-blue-800' }}">
                                {{ $menuItem->badge_text }}
                            </span>
                        @endif
                    </a>
                </li>
            @else
                <li x-data="{ open: false }" x-cloak class="relative">
                    <button
                        @click="open = !open"
                        @click.away="open = false"
                        type="button"
                        class="inline-flex w-full items-center justify-between rounded px-3 py-2 text-gray-700 hover:bg-gray-50 md:w-auto md:hover:bg-transparent md:hover:text-blue-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent md:dark:hover:text-blue-500"
                        :aria-expanded="open">
                        @if ($menuItem->icon)
                            <i class="{{ $menuItem->icon }} me-2"></i>
                        @endif
                        {{ $menuItem->name }}
                        <svg
                            class="ms-2 h-4 w-4 transition-transform"
                            :class="{ 'rotate-180': open }"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute left-0 z-50 mt-2 w-48 divide-y divide-gray-100 rounded-lg bg-white shadow-lg dark:bg-gray-700 md:left-auto"
                        @click.away="open = false"
                        style="display: none;">
                        <ul class="py-2 text-sm">
                            @foreach ($menuItem->children as $childItem)
                                <li>
                                    <a
                                        href="{{ $childItem->getFullUrl() }}"
                                        @if ($childItem->opens_new_tab) target="_blank" @else target="_self" @endif
                                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        @if ($childItem->route_name) wire:navigate @endif>
                                        @if ($childItem->icon)
                                            <i class="{{ $childItem->icon }} me-2"></i>
                                        @endif
                                        {{ $childItem->name }}
                                        @if ($childItem->badge_text)
                                            <span class="ms-2 rounded-full px-2 py-1 text-xs {{ $childItem->badge_color ?? 'bg-blue-100 text-blue-800' }}">
                                                {{ $childItem->badge_text }}
                                            </span>
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endif
        @endforeach
    </ul>
@endif