<div>
    @if ($carousels->count() > 0)
    <section class="relative z-0 group">
        <div id="hero-carousel" class="relative w-full" data-carousel="slide">
            <div class="relative h-[500px] overflow-hidden md:h-[700px]">
                @foreach ($carousels as $index => $carousel)
                <div class="{{ $index === 0 ? '' : 'hidden' }} absolute inset-0 h-full w-full duration-1000 ease-out" data-carousel-item>
                    @php
                    $imageUrl = null;
                    if ($carousel->featured_image) {
                        if (str_starts_with($carousel->featured_image, 'http')) {
                            $imageUrl = $carousel->featured_image;
                        } elseif (str_starts_with($carousel->featured_image, 'photos/')) {
                            $imageUrl = asset('storage/'.$carousel->featured_image);
                        } else {
                            $imageUrl = asset($carousel->featured_image);
                        }
                    }
                    @endphp

                    <div class="absolute inset-0 bg-blue-900">
                        @if($imageUrl)
                        <img src="{{ $imageUrl }}" class="h-full w-full object-cover transition-transform duration-[2000ms] ease-in-out group-hover:scale-105" alt="{{ $carousel->title }}">
                        @else
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-800"></div>
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/40 to-transparent"></div>
                    </div>

                    <div class="absolute inset-0 flex items-center">
                        <div class="container mx-auto px-6 md:px-12">
                            <div class="max-w-3xl text-white">
                                <span class="mb-4 inline-block rounded-full bg-blue-600/80 px-4 py-1.5 text-sm font-semibold backdrop-blur-sm">
                                    {{ config('app.name') }}
                                </span>
                                <h2 class="mb-6 text-4xl font-extrabold leading-tight tracking-tight drop-shadow-sm md:text-6xl lg:text-7xl">
                                    {{ $carousel->title }}
                                </h2>
                                @if ($carousel->description)
                                <p class="mb-8 text-lg font-light text-gray-200 drop-shadow-sm md:text-2xl leading-relaxed">
                                    {{ $carousel->description }}
                                </p>
                                @endif
                                @if ($carousel->link)
                                <a href="{{ $carousel->link }}" class="group inline-flex items-center gap-2 rounded-full bg-white px-7 py-3.5 text-base font-bold text-blue-700 shadow-lg transition-all hover:bg-blue-50 hover:shadow-xl focus:ring-4 focus:ring-blue-400/50">
                                    Selengkapnya
                                    <i class="fa-solid fa-arrow-right transition-transform group-hover:translate-x-1"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if ($carousels->count() > 1)
            <!-- Simplified Indicators -->
            <div class="absolute bottom-8 left-1/2 z-30 flex -translate-x-1/2 gap-3">
                @foreach ($carousels as $index => $carousel)
                <button type="button" class="h-2.5 w-2.5 rounded-full transition-all {{ $index === 0 ? 'bg-white w-8' : 'bg-white/50 hover:bg-white' }}" aria-current="{{ $index === 0 ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>
            <!-- Standard Controls -->
            <button type="button" class="group absolute left-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-prev>
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/10 backdrop-blur-sm transition-all group-hover:bg-white/30 group-focus:ring-4 group-focus:ring-white">
                    <svg class="h-5 w-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="group absolute right-0 top-0 z-30 flex h-full cursor-pointer items-center justify-center px-4 focus:outline-none" data-carousel-next>
                <span class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-white/10 backdrop-blur-sm transition-all group-hover:bg-white/30 group-focus:ring-4 group-focus:ring-white">
                    <svg class="h-5 w-5 text-white rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
            @endif
        </div>
    </section>
    @else
    <!-- Fallback Hero -->
    <section class="relative z-0 bg-gradient-to-br from-blue-900 via-blue-800 to-cyan-800 py-32 md:py-48">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-20"></div>
        <div class="container relative mx-auto px-6 text-center text-white">
            <span class="mb-6 inline-block rounded-full bg-white/10 px-6 py-2 text-sm font-semibold uppercase tracking-wider backdrop-blur-md">
                Selamat Datang di
            </span>
            <h2 class="mb-6 text-4xl font-extrabold tracking-tight md:text-6xl lg:text-7xl">
                {{ $landing_settings['landing_hero_title'] ?? 'Sistem Informasi Desa ' . config('app.name') }}
            </h2>
            <p class="mx-auto mb-10 max-w-2xl text-lg font-light text-blue-100 md:text-2xl leading-relaxed">
                {{ $landing_settings['landing_hero_subtitle'] ?? 'Wujudkan desa digital yang transparan, akuntabel, dan melayani.' }}
            </p>
            <div class="flex flex-col justify-center gap-4 sm:flex-row">
                <a href="#layanan" class="rounded-full bg-white px-8 py-4 text-base font-bold text-blue-800 shadow-lg transition-all hover:-translate-y-1 hover:shadow-xl focus:ring-4 focus:ring-blue-400">
                    Jelajahi Layanan
                </a>
                @if(isset($landing_settings['landing_video_url']))
                <a href="#video-profil" class="rounded-full border border-white/30 bg-white/10 px-8 py-4 text-base font-semibold text-white backdrop-blur-sm transition-all hover:bg-white/20 focus:ring-4 focus:ring-white/40">
                    <i class="fa-solid fa-play mr-2"></i> Tonton Video
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif

    <!-- Sambutan Section -->
    <section class="bg-white py-20 dark:bg-gray-900 overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 items-center gap-16 lg:grid-cols-2">
                <div class="order-2 lg:order-1" data-aos="fade-right">
                    <div class="mb-6 inline-flex items-center gap-2 rounded-lg bg-blue-50 px-3 py-1 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300">
                        <i class="fa-solid fa-user-tie"></i>
                        <span class="text-xs font-bold uppercase tracking-wide">Sambutan Kepala Desa</span>
                    </div>
                     <h2 class="mb-6 text-3xl font-extrabold text-gray-900 dark:text-white sm:text-4xl lg:text-5xl">
                        {{ $landing_settings['landing_welcome_title'] ?? 'Selamat Datang' }}
                        <span class="mt-2 block bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">{{ config('app.name') }}</span>
                    </h2>
                    <div class="prose prose-lg text-gray-600 dark:text-gray-400 leading-relaxed text-justify">
                         {!! nl2br(e($landing_settings['landing_welcome_body'] ?? 'Selamat datang di website resmi kami. Kami berkomitmen untuk memberikan pelayanan terbaik bagi masyarakat.')) !!}
                    </div>
                    
                    <div class="mt-8 flex items-center gap-4">
                         <div class="flex h-12 w-12 items-center justify-center rounded-full bg-blue-100 text-blue-600 dark:bg-blue-900 dark:text-blue-300">
                            <i class="fa-solid fa-quote-left"></i>
                         </div>
                         <div>
                             <p class="font-bold text-gray-900 dark:text-white">Kepala Desa</p>
                             <p class="text-sm text-gray-500 dark:text-gray-400">Periode 2024 - 2029</p>
                         </div>
                    </div>
                </div>
                <!-- Image with decorative elements -->
                <div class="order-1 relative lg:order-2" data-aos="fade-left">
                     <div class="absolute -right-4 -top-4 h-24 w-24 rounded-full bg-blue-100 opacity-50 blur-xl dark:bg-blue-900"></div>
                     <div class="absolute -bottom-4 -left-4 h-32 w-32 rounded-full bg-cyan-100 opacity-50 blur-xl dark:bg-cyan-900"></div>
                    <div class="relative mx-auto w-full max-w-lg rounded-2xl bg-white p-2 shadow-2xl ring-1 ring-gray-900/5 dark:bg-gray-800">
                        @if(isset($landing_settings['landing_welcome_image']))
                            <img class="w-full rounded-xl object-cover shadow-sm aspect-[4/5]" 
                                 src="{{ asset($landing_settings['landing_welcome_image']) }}" 
                                 alt="Sambutan Image">
                        @else
                            <div class="flex aspect-[4/5] w-full items-center justify-center rounded-xl bg-gray-100 text-gray-300 dark:bg-gray-700">
                                <i class="fa-solid fa-image text-6xl"></i>
                            </div>
                        @endif
                        <!-- Floating Card -->
                        <div class="absolute -bottom-6 -left-6 hidden md:block rounded-xl bg-white p-4 shadow-xl dark:bg-gray-800 border border-gray-100 dark:border-gray-700">
                            <div class="flex items-center gap-3">
                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-green-100 text-green-600">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <p class="text-sm font-bold text-gray-900 dark:text-white">Status Desa</p>
                                    <p class="text-xs text-green-600 font-semibold">Mandiri</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="bg-gray-50 py-24 dark:bg-gray-800 relative">
        <!-- Decoration -->
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/clean-gray-paper.png')] opacity-40"></div>
        
        <div class="relative mx-auto max-w-screen-xl px-4 lg:px-6">
            <div class="mx-auto mb-16 max-w-screen-md text-center">
                <span class="mb-2 block text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Layanan Publik</span>
                <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-gray-900 dark:text-white">Melayani dengan Sepenuh Hati</h2>
                <p class="text-lg font-light text-gray-500 dark:text-gray-400">Akses berbagai layanan administrasi dan informasi desa secara mudah, cepat, dan transparan.</p>
            </div>
            
            <div class="grid gap-8 md:grid-cols-3">
                 @for($i = 1; $i <= 3; $i++)
                    @if(isset($landing_settings['landing_service_'.$i.'_title']))
                    <div class="group relative rounded-2xl bg-white p-8 shadow-sm transition-all duration-300 hover:-translate-y-2 hover:shadow-xl dark:bg-gray-700 border border-gray-100 dark:border-gray-600">
                        <div class="mb-6 inline-flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-blue-500 to-cyan-500 text-white shadow-lg shadow-blue-500/30 transition-transform group-hover:scale-110">
                             <i class="{{ $landing_settings['landing_service_'.$i.'_icon'] ?? 'fa-solid fa-star' }} text-2xl"></i>
                        </div>
                        <h3 class="mb-3 text-xl font-bold text-gray-900 dark:text-white group-hover:text-blue-600 transition-colors">{{ $landing_settings['landing_service_'.$i.'_title'] }}</h3>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed">{{ $landing_settings['landing_service_'.$i.'_desc'] }}</p>
                        <div class="mt-6">
                            <a href="#" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                Pelajari lebih lanjut <i class="fa-solid fa-arrow-right ml-2 text-xs transition-transform group-hover:translate-x-1"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                 @endfor
             </div>
        </div>
    </section>

    <!-- Statistics Section (Full Width with Parallax Feel) -->
    @if(isset($landing_settings['landing_stats_population']) || isset($landing_settings['landing_stats_families']))
    <section class="relative bg-blue-900 py-24 dark:bg-blue-950 overflow-hidden">
         <!-- Background Elements -->
         <div class="absolute -left-20 -top-20 h-96 w-96 rounded-full bg-blue-600 opacity-20 blur-3xl"></div>
         <div class="absolute -right-20 -bottom-20 h-96 w-96 rounded-full bg-cyan-600 opacity-20 blur-3xl"></div>
         
        <div class="relative mx-auto max-w-screen-xl px-4 lg:px-6">
             <div class="mb-12 text-center text-white">
                 <h2 class="text-3xl font-bold mb-2">Statistik Desa</h2>
                 <p class="text-blue-200">Data kependudukan dan wilayah terkini</p>
             </div>
            <dl class="mx-auto grid max-w-screen-lg grid-cols-1 gap-12 text-center text-white sm:grid-cols-3">
                @if(isset($landing_settings['landing_stats_population']))
                <div class="flex flex-col items-center justify-center rounded-2xl bg-white/5 p-8 backdrop-blur-sm transition-transform hover:scale-105 border border-white/10">
                    <div class="mb-4 text-blue-300 text-4xl"><i class="fa-solid fa-users"></i></div>
                    <dt class="mb-2 text-5xl font-extrabold">{{ $landing_settings['landing_stats_population'] }}</dt>
                    <dd class="text-lg font-medium text-blue-200 uppercase tracking-widest text-sm">Total Penduduk</dd>
                </div>
                @endif
                @if(isset($landing_settings['landing_stats_families']))
                <div class="flex flex-col items-center justify-center rounded-2xl bg-white/5 p-8 backdrop-blur-sm transition-transform hover:scale-105 border border-white/10">
                    <div class="mb-4 text-green-300 text-4xl"><i class="fa-solid fa-house-user"></i></div>
                    <dt class="mb-2 text-5xl font-extrabold">{{ $landing_settings['landing_stats_families'] }}</dt>
                    <dd class="text-lg font-medium text-blue-200 uppercase tracking-widest text-sm">Kepala Keluarga</dd>
                </div>
                @endif
                @if(isset($landing_settings['landing_stats_area']))
                <div class="flex flex-col items-center justify-center rounded-2xl bg-white/5 p-8 backdrop-blur-sm transition-transform hover:scale-105 border border-white/10">
                     <div class="mb-4 text-yellow-300 text-4xl"><i class="fa-solid fa-map-location-dot"></i></div>
                    <dt class="mb-2 text-5xl font-extrabold">{{ $landing_settings['landing_stats_area'] }}</dt>
                    <dd class="text-lg font-medium text-blue-200 uppercase tracking-widest text-sm">Luas Wilayah (Ha)</dd>
                </div>
                @endif
            </dl>
        </div>
    </section>
    @endif

    <!-- Latest News Section -->
    <section class="bg-white py-24 dark:bg-gray-900">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-6">
            <div class="flex flex-col items-center justify-between mb-12 sm:flex-row">
                <div class="mb-4 sm:mb-0 text-center sm:text-left">
                     <span class="mb-2 block text-sm font-bold uppercase tracking-wider text-blue-600 dark:text-blue-400">Kabar Desa</span>
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">Berita Terkini</h2>
                </div>
                <a href="{{ url('/posts') }}" class="group inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                </a>
            </div>
            
            <div class="grid gap-8 lg:grid-cols-3">
                @forelse($latest_posts as $post)
                    <article class="group relative flex flex-col overflow-hidden rounded-2xl border border-gray-100 bg-white shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-700 dark:bg-gray-800">
                        <a href="{{ route('frontend.posts.show', $post->slug) }}" class="relative h-56 overflow-hidden">
                            @if($post->image)
                            <img class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110" 
                                 src="{{ Str::startsWith($post->image, 'http') ? $post->image : asset($post->image) }}" 
                                 alt="{{ $post->name }}">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gray-100 dark:bg-gray-700 transition-colors group-hover:bg-blue-50 dark:group-hover:bg-gray-600">
                                <i class="fa-regular fa-image text-4xl text-gray-300 dark:text-gray-500 group-hover:scale-110 transition-transform duration-500"></i>
                            </div>
                        @endif
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 transition-opacity group-hover:opacity-100"></div>
                        <span class="absolute top-4 right-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold uppercase tracking-wider text-blue-700 shadow-sm backdrop-blur-sm">
                            {{ $post->category->name ?? 'Info' }}
                        </span>
                        </a>
                        <div class="flex flex-1 flex-col p-6">
                            <div class="mb-4 flex items-center gap-3 text-xs text-gray-500 dark:text-gray-400">
                                <span class="flex items-center gap-1"><i class="fa-regular fa-calendar"></i> {{ $post->published_at->format('d M Y') }}</span>
                                <span class="flex items-center gap-1"><i class="fa-regular fa-user"></i> {{ $post->user->name ?? 'Admin' }}</span>
                            </div>
                            <h2 class="mb-3 text-xl font-bold leading-tight text-gray-900 group-hover:text-blue-600 dark:text-white dark:group-hover:text-blue-400 transition-colors">
                                <a href="{{ route('frontend.posts.show', $post->slug) }}">
                                    {{ Str::limit($post->name, 60) }}
                                </a>
                            </h2>
                            <p class="mb-4 flex-1 text-gray-500 dark:text-gray-400 line-clamp-3 text-sm leading-relaxed">
                                {{ Str::limit(strip_tags(html_entity_decode($post->content)), 120) }}
                            </p>
                            <div class="mt-auto border-t border-gray-100 pt-4 dark:border-gray-700">
                                <a href="{{ route('frontend.posts.show', $post->slug) }}" class="inline-flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 dark:text-blue-500">
                                    Baca Selengkapnya 
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 rounded-2xl border-2 border-dashed border-gray-200 p-12 text-center text-gray-500">
                        <i class="fa-regular fa-newspaper text-4xl mb-4 text-gray-300"></i>
                        <p>Belum ada berita terbaru saat ini.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Video Profile Section (Cinema Mode) -->
    @if(isset($landing_settings['landing_video_url']) && $landing_settings['landing_video_url'])
    <section id="video-profil" class="bg-gray-900 py-24 relative overflow-hidden">
        <!-- Abstract BG -->
        <div class="absolute inset-0 bg-blue-900/20"></div>
        <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-blue-500 to-transparent opacity-50"></div>
        
        <div class="relative mx-auto max-w-screen-xl px-4 text-center lg:px-6">
             <span class="mb-2 block text-sm font-bold uppercase tracking-wider text-blue-400">Jelajahi Desa</span>
            <h2 class="mb-4 text-4xl font-extrabold tracking-tight text-white">Video Profil Desa</h2>
            <p class="mb-10 font-light text-gray-400 sm:text-xl max-w-2xl mx-auto">Saksikan keindahan alam, budaya, dan potensi yang dimiliki oleh desa kami.</p>
            
            <div class="mx-auto max-w-5xl">
                <div class="relative w-full overflow-hidden rounded-2xl shadow-2xl ring-4 ring-white/10" style="padding-top: 56.25%">
                    @php
                        preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $landing_settings['landing_video_url'], $match);
                        $youtube_id = $match[1] ?? null;
                    @endphp
                    @if($youtube_id)
                        <iframe class="absolute top-0 left-0 bottom-0 right-0 h-full w-full"
                                src="https://www.youtube.com/embed/{{ $youtube_id }}" 
                                title="Video Profil Desa" frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                    @else
                        <div class="absolute top-0 left-0 flex h-full w-full items-center justify-center bg-gray-800 text-gray-500">
                            Video URL Error
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Map & Contact Section -->
    <section class="bg-gray-50 py-24 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl px-4 lg:px-6">
            <div class="overflow-hidden rounded-3xl bg-white shadow-xl dark:bg-gray-900 ring-1 ring-gray-200 dark:ring-gray-700">
                <div class="grid lg:grid-cols-5">
                    <!-- Contact Info -->
                    <div class="p-10 lg:col-span-2 bg-gradient-to-br from-blue-700 to-blue-900 text-white">
                        <h3 class="mb-6 text-2xl font-bold">Hubungi Kami</h3>
                        <p class="mb-8 text-blue-100 leading-relaxed">Jangan ragu untuk menghubungi atau mengunjungi kantor kami untuk keperluan administrasi dan layanan lainnya.</p>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white/20 backdrop-blur-sm">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <p class="font-bold">Alamat Kantor</p>
                                    <p class="text-sm text-blue-100 mt-1">{{ $landing_settings['landing_address'] ?? 'Alamat belum diatur' }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white/20 backdrop-blur-sm">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <p class="font-bold">Email</p>
                                    <p class="text-sm text-blue-100 mt-1">{{ $landing_settings['landing_email'] ?? 'email@desa.id' }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4">
                                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-lg bg-white/20 backdrop-blur-sm">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div>
                                    <p class="font-bold">Telepon / WhatsApp</p>
                                    <p class="text-sm text-blue-100 mt-1">{{ $landing_settings['landing_phone'] ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Social Media Placeholder -->
                        <div class="mt-10 pt-8 border-t border-white/20">
                            <p class="mb-4 text-sm font-semibold uppercase tracking-wider text-blue-200">Media Sosial</p>
                            <div class="flex gap-4">
                                <a href="#" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/30 transition-colors"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/30 transition-colors"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="h-10 w-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-white/30 transition-colors"><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Map -->
                    <div class="lg:col-span-3 h-[500px] bg-gray-200 dark:bg-gray-800 relative">
                        @if(isset($landing_settings['landing_maps_embed']) && $landing_settings['landing_maps_embed'])
                            <div class="absolute inset-0 iframe-container">
                                {!! str_replace('<iframe', '<iframe class="w-full h-full"', $landing_settings['landing_maps_embed']) !!}
                            </div>
                        @else
                           <div class="flex h-full w-full items-center justify-center text-gray-400">
                               <div class="text-center">
                                   <i class="fa-solid fa-map-location-dot text-6xl mb-4"></i>
                                   <p>Peta belum disematkan</p>
                               </div>
                           </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('after-scripts')
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    @endpush
</div>