<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Reception_product extends Model
{
    protected $table = 'reception_products';
    protected $guarded = [];

    public function receptionDetail()
    {
        return $this->belongsTo(\App\Models\Reception::class, 'reception_id');
    }
    public function productDetail()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id');
    }



    public static function getDataForDataTable()
    {
        $query = self::with(['receptionDetail', 'productDetail'])->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('reception_id', function ($reception_product) {
                return $reception_product->receptionDetail->received_date;
            })
            ->addColumn('product_id', function ($reception_product) {
                return $reception_product->productDetail->name;
            })

            ->addColumn('action', function ($reception_product) {
                return view('back.reception_product.actions', compact('reception_product'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
