@extends('frontend.layouts.app')

@section('title')
{{ __($module_title) }}
@endsection

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-600 via-blue-700 to-blue-900 py-20 text-white">
    <div class="container mx-auto px-4">
        <div class="mx-auto max-w-3xl text-center">
            <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl">
                {{ __($module_title) }}
            </h1>
            <p class="mb-8 text-lg font-normal text-blue-100 sm:px-16 lg:text-xl xl:px-48">
                Informasi lengkap tentang profil dan pemerintahan Desa Dukuhlor
            </p>

            <!-- Search Box -->
            <form action="{{ route('frontend.profil-desa.index') }}" method="GET" class="mx-auto max-w-md">
                <div class="relative">
                    <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="h-4 w-4 text-gray-500 dark:text-gray-400" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input
                        type="search"
                        name="q"
                        class="block w-full rounded-lg border border-gray-300 bg-white p-4 ps-10 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500"
                        placeholder="Cari informasi profil desa..."
                        value="{{ request('q') }}" />
                    <button type="submit" class="absolute bottom-2.5 end-2.5 rounded-lg bg-blue-700 px-4 py-2 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        Cari
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@include('frontend.includes.messages')

<!-- Content Section -->
<section class="bg-white py-12 dark:bg-gray-900">
    <div class="container mx-auto px-4">
        <!-- Stats Cards -->
        <div class="mb-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <div class="flex items-center rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="me-4 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900">
                    <svg class="h-6 w-6 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-1 text-2xl font-bold text-gray-900 dark:text-white">{{ $$module_name->total() }}</p>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Total Halaman</p>
                </div>
            </div>

            <div class="flex items-center rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="me-4 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-green-100 dark:bg-green-900">
                    <svg class="h-6 w-6 text-green-600 dark:text-green-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-1 text-2xl font-bold text-gray-900 dark:text-white">{{ $$module_name->where('is_active', true)->count() }}</p>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Halaman Aktif</p>
                </div>
            </div>

            <div class="flex items-center rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="me-4 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900">
                    <svg class="h-6 w-6 text-purple-600 dark:text-purple-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-1 text-2xl font-bold text-gray-900 dark:text-white">-</p>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Pengunjung Hari Ini</p>
                </div>
            </div>

            <div class="flex items-center rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="me-4 flex h-12 w-12 shrink-0 items-center justify-center rounded-full bg-orange-100 dark:bg-orange-900">
                    <svg class="h-6 w-6 text-orange-600 dark:text-orange-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-1 text-2xl font-bold text-gray-900 dark:text-white">{{ $$module_name->first()?->updated_at?->diffForHumans() ?? '-' }}</p>
                    <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Update Terakhir</p>
                </div>
            </div>
        </div>

        <!-- Profile Cards Grid -->
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($$module_name as $$module_name_singular)
            @php
            $details_url = route('frontend.profil-desa.show', $$module_name_singular->slug);
            @endphp

            <div class="flex flex-col overflow-hidden rounded-lg border border-gray-200 bg-white shadow-md transition-shadow hover:shadow-lg dark:border-gray-700 dark:bg-gray-800">
                @if ($$module_name_singular->featured_image)
                <div class="relative h-48 overflow-hidden">
                    <img
                        class="h-full w-full object-cover transition-transform duration-300 hover:scale-105"
                        src="{{ asset($$module_name_singular->featured_image) }}"
                        alt="{{ $$module_name_singular->title }}" />
                    <div class="absolute right-2 top-2">
                        <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white shadow-lg">
                            #{{ $$module_name_singular->order }}
                        </span>
                    </div>
                </div>
                @else
                <div class="flex h-48 items-center justify-center bg-gradient-to-br from-blue-100 to-blue-200 dark:from-blue-900 dark:to-blue-800">
                    <svg class="h-20 w-20 text-blue-600 dark:text-blue-300" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                @endif

                <div class="flex flex-1 flex-col p-5">
                    <a href="{{ $details_url }}" class="group">
                        <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400">
                            {{ $$module_name_singular->title }}
                        </h5>
                    </a>

                    @if ($$module_name_singular->meta_description)
                    <p class="mb-3 flex-1 text-sm font-normal text-gray-700 dark:text-gray-400">
                        {{ Str::limit($$module_name_singular->meta_description, 120) }}
                    </p>
                    @endif

                    <div class="mt-auto flex items-center justify-between pt-4">
                        <a
                            href="{{ $details_url }}"
                            class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2 text-center text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Selengkapnya
                            <svg class="ms-2 h-3.5 w-3.5 rtl:rotate-180" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>

                        <span class="flex items-center text-xs text-gray-500 dark:text-gray-400">
                            <svg class="me-1 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $$module_name_singular->updated_at->diffForHumans() }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full">
                <div class="flex flex-col items-center justify-center rounded-lg border border-gray-200 bg-white p-12 text-center dark:border-gray-700 dark:bg-gray-800">
                    <svg class="mb-4 h-20 w-20 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mb-2 text-xl font-semibold text-gray-900 dark:text-white">Belum Ada Data</h3>
                    <p class="text-gray-600 dark:text-gray-400">Halaman profil desa belum tersedia</p>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if ($$module_name->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $$module_name->links() }}
        </div>
        @endif
    </div>
</section>
@endsection