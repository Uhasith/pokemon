<?php

namespace App\Jobs;

use App\Models\PokeAllSet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPokeAllSetsJob implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $chunk;

    /**
     * Create a new job instance.
     */
    public function __construct($chunk)
    {
        $this->chunk = $chunk;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        foreach ($this->chunk as $row) {

            $data = [
                'set_id' => $row['id'] ?? null,
                'images' => is_array($row['images']) ? $row['images'] : [],
                'legalities' => is_array($row['legalities']) ? $row['legalities'] : [],
                'name' => $row['name'] ?? null,
                'printed_total' => is_numeric($row['printedTotal'] ?? null) ? $row['printedTotal'] : null,
                'ptcgo_code' => $row['ptcgoCode'] ?? null,
                'release_date' => $row['releaseDate'] ?? null,
                'series' => $row['series'] ?? null,
                'total' => is_numeric($row['total'] ?? null) ? $row['total'] : null,
                'updated_at_ts' => $row['updatedAt'] ?? null,
            ];
            // Insert the data into the database
            PokeAllSet::create($data);
        }
    }
}
