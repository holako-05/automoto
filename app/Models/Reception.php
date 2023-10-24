<?php

namespace App\Models;

use App\Models\Product;
use Yajra\DataTables\DataTables;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    protected $table = 'receptions';
    protected $guarded = [];

    public function products()
    {
        // return $this->belongsToMany(Product::class, 'reception_products')
        //     ->withPivot('receiver_quantity')
        //     ->withTimestamps();
        return $this->hasMany(Reception_product::class, 'reception_id', 'id');
    }


    public static function getDataForDataTable()
    {
        $query = self::query()->where('deleted', '0');

        return DataTables::of($query)

            ->addColumn('action', function ($reception) {
                return view('back.reception.actions', compact('reception'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
