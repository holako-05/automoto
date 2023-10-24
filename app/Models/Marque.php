<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Marque extends Model
{
    protected $table = 'marques';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($marque) {
                        return view('back.marque.actions', compact('marque'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
