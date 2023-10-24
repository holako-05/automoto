<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Facture_article extends Model
{
    protected $table = 'facture_articles';
    protected $guarded = [];

    	public function factureDetail(){
            return $this->belongsTo(\App\Models\Facture::class, 'facture_id');
        } 



    public static function getDataForDataTable()
            {
                $query = self::with(['factureDetail'])->where('deleted', '0');

                return DataTables::of($query)
                    ->addColumn('facture_id', function ($facture_article) {
                    return $facture_article->factureDetail->code;})

                    ->addColumn('action', function ($facture_article) {
                        return view('back.facture_article.actions', compact('facture_article'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
