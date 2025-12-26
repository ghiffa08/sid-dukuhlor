<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Modules\Carousel\Models\Carousel;

class Home extends Component
{
    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $carousels = Carousel::query()
            ->active()
            ->ordered()
            ->get();
        $settings = \Illuminate\Support\Facades\DB::table('settings')
            ->where('name', 'like', 'landing_%')
            ->pluck('val', 'name')
            ->toArray();

        $latest_posts = \Modules\Post\Models\Post::query()
            ->with(['media', 'category', 'user'])
            ->where('status', \Modules\Post\Enums\PostStatus::Published->value)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        return view('livewire.frontend.home', [
            'carousels' => $carousels,
            'landing_settings' => $settings,
            'latest_posts' => $latest_posts,
        ]);
    }
}
