<?php

namespace Modules\Penduduk\Console\Commands;

use Illuminate\Console\Command;

class PendudukCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:PendudukCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Penduduk Command description';

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
