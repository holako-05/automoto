<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Categorie extends Model
{
    protected $table = 'categories';
    protected $guarded = [];



    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public static function getDataForDataTable()
    {
        $query = self::query()->where('deleted', '0');

        return DataTables::of($query)

            ->addColumn('action', function ($categorie) {
                return view('back.categorie.actions', compact('categorie'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
