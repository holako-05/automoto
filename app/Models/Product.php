<?php

namespace App\Models;

use App\Models\Categorie;
use App\Models\Reception;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function receptions()
    {
        return $this->belongsToMany(Reception::class, 'reception_product')
            ->withPivot('received_quantity')
            ->withTimestamps();
    }

    public static function getDataForDataTable()
    {
        $query = self::with(['category'])->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('category_id', function ($product) {
                return $product->category->name;
            })

            ->addColumn('action', function ($product) {
                return view('back.product.actions', compact('product'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
