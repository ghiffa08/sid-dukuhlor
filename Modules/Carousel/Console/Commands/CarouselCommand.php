<?php

namespace Modules\Carousel\Console\Commands;

use Illuminate\Console\Command;

class CarouselCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:CarouselCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Carousel Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
