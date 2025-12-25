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

        return view('livewire.frontend.home', [
            'carousels' => $carousels,
        ]);
    }
}
