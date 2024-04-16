<?php

namespace App\Console\Commands;

use App\Models\Polling;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckPollingStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'polling:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check-update-polling-status';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        Polling::where('is_active', 1)
            ->where('end_at', '<', $now)
            ->update(['is_active' => 0]);

        $this->info('Polling status updated successfully.');

        return 0;
    }
}
