<?php

namespace Modules\Statistic\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [

        /**
         * Backend
         */
        'Modules\Statistic\Events\Backend\NewCreated' => [
            'Modules\Statistic\Listeners\Backend\NewCreated\UpdateAllOnNewCreated',
        ],

    /**
     * Frontend
     */
    ];
}
