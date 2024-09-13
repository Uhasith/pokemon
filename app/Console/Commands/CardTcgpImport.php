<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Imports\CardTcgpsImport;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class CardTcgpImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:card-tcgp-import';

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
        Log::info("call command");

        // Ensure the file exists
        $filePath = storage_path('app/excel-files/tcgp_cards.csv');

        if (file_exists($filePath)) {
            Excel::import(new CardTcgpsImport(), $filePath);
            Log::info("Import completed.");
        } else {
            Log::error("File not found at path: " . $filePath);
        }
    }
}
