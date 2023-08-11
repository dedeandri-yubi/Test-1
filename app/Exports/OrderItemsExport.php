<?php

namespace App\Exports;

use App\Models\OrderItems;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class OrderItemsExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public function query()
    {
        $search = '%' . request()->query('search') . '%';
        $report = OrderItems::with('product:id,name,merchant_id', 'product.merchant:id,city_id,name', 'product.merchant.city')->whereHas('product', function ($query) use ($search) {
            $query->where('name', 'like', $search);
        });

        return $report;
    }

    public function headings(): array
    {
        return [
            'Product',
            'Date',
            'Quantity',
            'City',
            'Status',
            'User'
        ];
    }

    public function map($row): array
    {
        return [
            $row->product->name,
            $row->date,
            $row->quantity,
            $row->product->merchant->city->name,
            $row->order_status->status->name,
            $row->user->name,
        ];
    }
}
