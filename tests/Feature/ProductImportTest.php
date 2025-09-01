<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Queue;
use App\Jobs\ProcessProductImport;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductImportTest extends TestCase
{
   // use RefreshDatabase;
    
    public function test_import_csv_dispatches_jobs_successfully()
    {
        $this->withoutMiddleware(); // DISABLE CSRF

        // Fake the queue so jobs are not executed immediately
        Queue::fake();

        $csvContent = "product_name,description,price,category,stock,image\n".
                      "Product1,Desc1,100,Cat1,10,\n".
                      "Product2,Desc2,200,Cat2,5,";

        $file = UploadedFile::fake()->createWithContent('products.csv', $csvContent, 'text/csv');

        $response = $this->post('/admin/products/import', [
            'csv' => $file
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success', 'Products imported successfully!');
          
        Queue::assertPushed(ProcessProductImport::class, 1);
    }

    public function test_import_csv_with_invalid_rows_skips_and_returns_errors()
    {
        $this->withoutMiddleware(); // DISABLE CSRF

        Queue::fake();

        $csvContent = "product_name,description,price,category,stock,image\n".
                      ",Desc1,abc,Cat1,xyz,\n".  // invalid row
                      "Product2,Desc2,200,Cat2,5,"; // valid row

        $file = UploadedFile::fake()->createWithContent('products.csv', $csvContent);

        $response = $this->post('/admin/products/import', [
            'csv' => $file
        ]);

        $response->assertRedirect();

        // Only one valid job should be dispatched
        Queue::assertPushed(ProcessProductImport::class, 1);
    }

    public function test_job_inserts_product_into_database()
    {
        $this->withoutMiddleware(); // DISABLE CSRF

        Queue::fake();

         // Create a fake CSV file
        $csvContent = "product_name,description,price,stock,category,image\nTest Product,description test feature bulk import,150,20,test cat,\n";
        $filePath = 'test_products.csv';
        Storage::disk('public')->put($filePath, $csvContent);

        $job = new ProcessProductImport('public/'.$filePath);
        $job->handle();

        // Assert product inserted
        $this->assertDatabaseHas('products', [
            'product_name' => 'Test Product',
            'description' => 'description test feature bulk import',
            'price'        => 150,
            'stock'        => 20,
            'category'    => 'test cat',
            'image'       => '',
        ]);
    }
   
}
