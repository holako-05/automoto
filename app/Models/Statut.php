<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Statut extends Model
{
    protected $table = 'statuts';
    protected $guarded = [];




    public static function getDataForDataTable()
    {
        $query = self::query()->where('deleted', '0');

        return DataTables::of($query)

            ->addColumn('action', function ($statut) {
                return view('back.statut.actions', compact('statut'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public static function getStatutByCode($code)
    {
        $status =  Statut::where('code', $code)
            ->where('deleted', '0')
            ->orderBy('order', 'asc')
            ->get();
        return $status;
    }
}
