<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Typeservice extends Model
{
    protected $table = 'typeservices';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($typeservice) {
                        return view('back.typeservice.actions', compact('typeservice'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
