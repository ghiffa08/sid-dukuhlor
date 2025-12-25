<?php

namespace Modules\Carousel\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        /**
         * Backend
         */
        'Modules\Carousel\Events\Backend\NewCreated' => [
            'Modules\Carousel\Listeners\Backend\NewCreated\UpdateAllOnNewCreated',
        ],

    /**
     * Frontend
     */
    ];
}
