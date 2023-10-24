<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Speciality extends Model
{
    protected $table = 'specialitys';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($speciality) {
                        return view('back.speciality.actions', compact('speciality'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
