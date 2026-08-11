<?php

declare(strict_types=1);

namespace DataLens\DataLens\Console\Commands;

use Illuminate\Console\Command;

class DataLensCommand extends Command
{
    /**
     * The command signature.
     */
    protected $signature = 'datalens:placeholder';

    /**
     * The command description.
     */
    protected $description = 'Placeholder Artisan command shipped by the package datalens.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $this->line('DataLens placeholder command executed.');

        return self::SUCCESS;
    }
}
