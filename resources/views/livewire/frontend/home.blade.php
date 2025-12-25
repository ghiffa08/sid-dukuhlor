<div>
    @if ($carousels->count() > 0)
    <section class="relative z-0">
        @if ($carousels->count() > 0)
        <section class="relative z-0">
            <div id="hero-carousel" class="relative w-full" data-carousel="slide">
                <div class="relative h-96 overflow-hidden md:h-[600px]">
                    @foreach ($carousels as $index => $carousel)

                    <div class="{{ $index === 0 ? '' : 'hidden' }} absolute inset-0 h-full w-full duration-700 ease-in-out" data-carousel-item>

                        @php
                        if (str_starts_with($carousel->featured_image, 'http')) {
                        $imageUrl = $carousel->featured_image;
                        } elseif (str_starts_with($carousel->featured_image, 'photos/')) {
                        $imageUrl = asset('storage/'.$carousel->featured_image);
                        } else {
                        $imageUrl = asset($carousel->featured_image);
                        }
                        @endphp

                        <div class="absolute inset-0">
                            <img src="{{ $imageUrl }}" class="h-full w-full object-cover" alt="{{ $carousel->title }}">
                        </div>

                        <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-b from-black/30 via-black/40 to-black/50">
                            <div class="px-4 text-center text-white">
                                <h2 class="mb-4 text-4xl font-bold drop-shadow-lg md:text-6xl">{{ $carousel->title }}</h2>
                                @if ($carousel->description)
                                <p class="mb-6 text-lg drop-shadow-md md:text-xl">{{ $carousel->description }}</p>
                                @endif
                                @if ($carousel->link)
                                <a href="{{ $carousel->link }}" class="inline-block rounded-lg bg-blue-600 px-6 py-3 text-white shadow-lg transition hover:bg-blue-700 hover:shadow-xl">
                                    Learn More
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                @if ($carousels->count() > 1)
                <div class="absolute bottom-5 left-1/2 z-30 flex -translate-x-1/2 gap-3">
                    @foreach ($carousels as $index => $carousel)
                    <button type="button" class="h-3 w-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                    @endforeach
                </div>
                <button type="button" class="group absolute left-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-prev>
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                        <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="group absolute right-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-next>
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-white/30 group-hover:bg-white/50 group-focus:outline-none group-focus:ring-4 group-focus:ring-white dark:bg-gray-800/30 dark:group-hover:bg-gray-800/60 dark:group-focus:ring-gray-800/70">
                        <svg class="h-4 w-4 text-white rtl:rotate-180 dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
                @endif
            </div>
        </section>
        @endif
    </section>
    @else
    <section class="relative z-0 bg-gradient-to-r from-blue-600 to-blue-800">
        <div class="flex h-96 items-center justify-center text-center text-white md:h-[600px]">
            <div>
                <h2 class="mb-4 text-4xl font-bold md:text-6xl">Welcome to {{ config('app.name') }}</h2>
                <p class="mb-6 text-lg md:text-xl">Your trusted platform for excellence</p>
            </div>
        </div>
    </section>
    @endif

    <section class="bg-white py-20 dark:bg-gray-800">
        <div class="mx-auto max-w-7xl px-4 text-center sm:px-12">
            <h2 class="mb-4 text-3xl font-bold">Welcome to {{ config('app.name') }}</h2>
            <p class="text-lg text-gray-600 dark:text-gray-400">Your trusted platform for excellence</p>
        </div>
    </section>

    <section class="bg-gray-100 py-20 text-gray-600 dark:bg-gray-700 dark:text-gray-400">
        <div class="container mx-auto flex flex-col items-center justify-center px-5">
            <h2 class="mb-8 text-3xl font-bold">Our Services</h2>
        </div>
    </section>

    <section class="bg-gray-50 pb-20 dark:bg-gray-700">
        <div class="grid grid-cols-1 gap-4 p-5 sm:grid-cols-2">
            <!-- Add content here -->
        </div>
    </section>
</div>

@push('after-scripts')
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
@endpush