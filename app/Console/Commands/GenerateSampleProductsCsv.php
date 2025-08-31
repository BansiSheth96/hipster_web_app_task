<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class GenerateSampleProductsCsv extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
   // protected $signature = 'app:generate-sample-products-csv';
    protected $signature = 'products:sample-csv {count=100}';

    /**
     * The console command description.
     *
     * @var string
     */
    //protected $description = 'Command description';
    protected $description = 'Generate sample products CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = $this->argument('count');

        $headers = [
            'product_name', 
            'description', 
            'price',
            'category', 
            'stock', 
            'image'
        ];
        $rows = [];
        $rows[] = implode(',', $headers);

        for ($i = 1; $i <= $count; $i++) {
            $rows[] = "Product {$i},Sample description {$i}," . rand(10, 500) . ",Category" . rand(1, 5) . "," . rand(1, 100) . ",";
        }

        Storage::put("products_sample_import.csv", implode("\n", $rows));

        $this->info("Sample CSV generated at storage/app/products_sample_import.csv");
    }
}
