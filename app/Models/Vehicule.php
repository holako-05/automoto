<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Vehicule extends Model
{
    protected $table = 'vehicules';
    protected $guarded = [];

    public function clientDetail()
    {
        return $this->belongsTo(\App\Models\Client::class, 'client_id');
    }
    public function marqueDetail()
    {
        return $this->belongsTo(\App\Models\Marque::class, 'marque_id');
    }
    public function modeleDetail()
    {
        return $this->belongsTo(\App\Models\Modele::class, 'modele_id');
    }
    public function anneeDetail()
    {
        return $this->belongsTo(\App\Models\Annee::class, 'year');
    }



    public static function getDataForDataTable()
    {
        $query = self::with(['clientDetail', 'marqueDetail', 'modeleDetail', 'anneeDetail'])->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('client_id', function ($vehicule) {
                return $vehicule->clientDetail->last_name;
            })
            ->addColumn('marque_id', function ($vehicule) {
                return $vehicule->marqueDetail->title;
            })
            ->addColumn('modele_id', function ($vehicule) {
                return $vehicule->modeleDetail->title;
            })
            ->addColumn('year', function ($vehicule) {
                return $vehicule->anneeDetail->year;
            })

            ->addColumn('action', function ($vehicule) {
                return view('back.vehicule.actions', compact('vehicule'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
