<div class="space-y-4">
    @foreach ($recentPosts as $row)
        @php
            $details_url = route("frontend.posts.show", [encode_id($row->id), $row->slug]);
        @endphp

        <a href="{{ $details_url }}" class="group flex items-start space-x-4 p-2 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors">
            <!-- Image / Fallback -->
            <div class="relative h-16 w-16 flex-shrink-0 overflow-hidden rounded-lg shadow-sm group-hover:shadow-md transition-shadow">
                @if ($row->image)
                    <img
                        src="{{ $row->image }}"
                        alt="{{ $row->name }}"
                        class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110"
                        onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                    />
                    <!-- Fallback if load fails -->
                    <div class="hidden absolute inset-0 bg-gradient-to-br from-blue-100 to-blue-200 items-center justify-center dark:from-blue-900 dark:to-blue-800">
                        <i class="fa-regular fa-newspaper text-blue-400 dark:text-blue-300"></i>
                    </div>
                @else
                    <!-- Default Fallback -->
                    <div class="h-full w-full bg-gradient-to-br from-blue-100 to-blue-200 flex items-center justify-center dark:from-blue-900 dark:to-blue-800">
                        <i class="fa-regular fa-newspaper text-blue-400 dark:text-blue-300"></i>
                    </div>
                @endif
            </div>

            <!-- Content -->
            <div class="flex-1 min-w-0">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-gray-100 line-clamp-2 group-hover:text-blue-600 transition-colors">
                    {{ $row->name }}
                </h4>
                <div class="mt-1 flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                    <i class="fa-regular fa-calendar"></i>
                    <span>{{ $row->created_at->isoFormat('D MMM Y') }}</span>
                </div>
            </div>
        </a>
    @endforeach
</div>
