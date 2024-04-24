<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class RotateLogs extends Command
{
    protected $signature = 'logs:rotate';

    protected $description = 'Rotate the log files';

    public function handle()
    {
        $logPath = storage_path('logs/');
        $currentLogFile = $logPath . 'laravel.log';
        $newLogFile = $logPath . 'laravel_' . date('Y-m-d') . '.log';

        if (File::exists($currentLogFile)) {
            File::move($currentLogFile, $newLogFile);
            touch($currentLogFile);
            Log::info('Log files rotated successfully!');
        } else {
            Log::error('Current log file not found!');
        }
    }
}

