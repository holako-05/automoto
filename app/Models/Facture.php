<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Facture extends Model
{
    protected $table = 'factures';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($facture) {
                        return view('back.facture.actions', compact('facture'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
