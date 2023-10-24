<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Annee extends Model
{
    protected $table = 'annees';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($annee) {
                        return view('back.annee.actions', compact('annee'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
