<?php


namespace App\Exports;

use App\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class ProductsExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return Product::with('category')->get();
    }

    
    public function headings(): array
    {
        return [
            'ID',
            'Product Name',
            'Category',
            'Price',
            'Stock',
            'Created At',
        ];
    }

    
    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->category->name, // Mengambil nama dari relasi
            $product->price,
            $product->stock,
            $product->created_at->toDateTimeString(),
        ];
    }
}