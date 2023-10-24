<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Modele extends Model
{
    protected $table = 'modeles';
    protected $guarded = [];

    	public function marqueDetail(){
            return $this->belongsTo(\App\Models\Marque::class, 'marque_id');
        } 



    public static function getDataForDataTable()
            {
                $query = self::with(['marqueDetail'])->where('deleted', '0');

                return DataTables::of($query)
                    ->addColumn('marque_id', function ($modele) {
                    return $modele->marqueDetail->title;})

                    ->addColumn('action', function ($modele) {
                        return view('back.modele.actions', compact('modele'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
