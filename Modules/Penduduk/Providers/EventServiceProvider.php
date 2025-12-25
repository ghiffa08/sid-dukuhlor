<?php

namespace Modules\Penduduk\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        /**
         * Backend
         */
        'Modules\Penduduk\Events\Backend\NewCreated' => [
            'Modules\Penduduk\Listeners\Backend\NewCreated\UpdateAllOnNewCreated',
        ],

    /**
     * Frontend
     */
    ];
}
