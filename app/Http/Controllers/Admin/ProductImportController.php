<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use App\Jobs\ProcessProductImport;
use App\Models\Product;

class ProductImportController extends Controller
{
    public function showImportForm()
    {
        return view('admin.products.import'); 
    }

   public function import(Request $request)
    {
        $request->validate([
            'csv' => 'required',
        ]);

        $file = $request->file('csv');
        $path = $file->getRealPath();

        if (($handle = fopen($path, "r")) !== false) {
            $header = fgetcsv($handle, 1000, ",");

            while (($row = fgetcsv($handle, 1000, ",")) !== false) {
                $rowData = array_combine($header, $row);

                if ($rowData) {
                    $imagePath = null;

                    if (!empty($rowData['image'])) {
                        try {
                            $imageUrl = $rowData['image'];
                            $response = \Illuminate\Support\Facades\Http::get($imageUrl);

                            if ($response->ok()) {
                                $extension = pathinfo(parse_url($imageUrl, PHP_URL_PATH), PATHINFO_EXTENSION);
                                $fileName = \Illuminate\Support\Str::uuid() . '.' . $extension;

                                \Illuminate\Support\Facades\Storage::disk('public')->put(
                                    'products/' . $fileName,
                                    $response->body()
                                );

                                $imagePath = 'products/' . $fileName;
                            }
                        } catch (\Exception $e) {
                            $imagePath = null;
                        }
                    }

                    Product::create([
                        'product_name' => $rowData['product_name'] ?? null,
                        'description'  => $rowData['description'] ?? null,
                        'price'        => isset($rowData['price']) ? (float)$rowData['price'] : 0,
                        'category'     => $rowData['category'] ?? null,
                        'stock'        => isset($rowData['stock']) ? (int)$rowData['stock'] : 0,
                        'image'        => $imagePath,
                    ]);
                }
            }

            fclose($handle);
        }

        return back()->with('success', 'Products imported successfully!');
    }
            
}
