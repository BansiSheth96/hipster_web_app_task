<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Models\Product;
//use Illuminate\Bus\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessProductImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $path;

    /**
     * Create a new job instance.
    */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Execute the job.
    */
    public function handle()
    {
        $path = is_array($this->path) ? reset($this->path) : $this->path;

        $fullPath = storage_path('app/' . $path);

        if (!file_exists($fullPath)) {
            \Log::error("Import failed: File not found at {$fullPath}");
            return;
        }

        if (($handle = fopen($fullPath, 'r')) === false) {
            \Log::error("Import failed: Unable to open file at {$fullPath}");
            return;
        }

        $header = fgetcsv($handle, 0, ','); // read header row
        $defaultImage = 'default.png';

        $batch = [];
        $chunkSize = 1000;

        while (($row = fgetcsv($handle, 0, ',')) !== false) {
            $data = array_combine($header, $row);

            if (empty($data['product_name']) || empty($data['price'])) {
                continue;
            }

            $batch[] = [
                'product_name' => $data['product_name'],
                'description'  => $data['description'] ?? null,
                'price'        => (float) $data['price'],
                'category'     => $data['category'] ?? 'General',
                'stock'        => (int) ($data['stock'] ?? 0),
                'image'        => $data['image'] ?? $defaultImage,
                'created_at'   => now(),
                'updated_at'   => now(),
            ];

            if (count($batch) >= $chunkSize) {
                Product::insert($batch);
                $batch = [];
            }
        }

        if (count($batch)) {
            Product::insert($batch);
        }

        fclose($handle);
    }
}
