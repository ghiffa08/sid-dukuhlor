<?php

namespace Modules\ProfileDesa\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        /**
         * Backend
         */
        'Modules\ProfileDesa\Events\Backend\NewCreated' => [
            'Modules\ProfileDesa\Listeners\Backend\NewCreated\UpdateAllOnNewCreated',
        ],

    /**
     * Frontend
     */
    ];
}
