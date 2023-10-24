<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Position extends Model
{
    protected $table = 'positions';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($position) {
                        return view('back.position.actions', compact('position'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
