<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Service extends Model
{
    protected $table = 'services';
    protected $guarded = [];

    public function typeserviceDetail()
    {
        return $this->belongsTo(\App\Models\Typeservice::class, 'type_service_id');
    }



    public static function getDataForDataTable()
    {
        $query = self::with(['typeserviceDetail'])->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('type_service_id', function ($service) {
                return $service->typeserviceDetail->title;
            })

            ->addColumn('action', function ($service) {
                return view('back.service.actions', compact('service'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
