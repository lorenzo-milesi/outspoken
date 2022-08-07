<?php

namespace IloveCode\Outspoken\Commands;

use Illuminate\Console\Command;

class OutspokenCommand extends Command
{
    public $signature = 'outspoken';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
