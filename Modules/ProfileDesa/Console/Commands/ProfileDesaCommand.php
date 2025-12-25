<?php

namespace Modules\ProfileDesa\Console\Commands;

use Illuminate\Console\Command;

class ProfileDesaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ProfileDesaCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ProfileDesa Command description';

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
