<?php

namespace App\Console\Commands;

use App\Jobs\ImportPokeAllSetsJob;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PokeAllSetsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:poke-all-sets-import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Path to the JSON file
        $filePath = storage_path('app/json-files/tcg_all_set.json');

        // Check if the file exists
        if (! file_exists($filePath)) {
            Log::error('File not found: '.$filePath);

            return;
        }

        // Read and decode the JSON file in chunks
        $jsonData = file_get_contents($filePath);
        $data = json_decode($jsonData, true);

        if (! is_array($data)) {
            Log::error('Invalid JSON format');

            return;
        }

        // Define chunk size
        $chunkSize = 100; // Customize based on your system's memory and performance

        // Process the data in chunks
        $chunks = array_chunk($data, $chunkSize, true); // Keep the card ID as keys

        foreach ($chunks as $chunk) {
            // Dispatch each chunk to the job for processing
            ImportPokeAllSetsJob::dispatch($chunk); // Pass chunk to the job
        }

        Log::info('All chunks dispatched for background processing.');
    }
}
