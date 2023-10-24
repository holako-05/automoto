<?php

namespace App\Models;

use App\Models\Client;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $guarded = [];



    public function serviceDetails(){
        return $this->belongsTo(\App\Models\Service::class, 'service_id');
    }
    public function clientDetail(){
        return $this->hasOne(\App\Models\Client::class, 'client_id');
    }
    public function typeserviceDetails(){
        return $this->belongsTo(\App\Models\Typeservice::class, 'type_service_id');
    }
    public function statutDetails(){
        return $this->belongsTo(\App\Models\Statut::class, 'statut');
    }
    // public static function getDataForDataTable()
    // {
    //     $query = self::query()->where('deleted', '0');

    //     return DataTables::of($query)

    //         ->addColumn('action', function ($reservation) {
    //             return view('back.reservation.actions', compact('reservation'))->render();
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }

    public function getIsClientAttribute()
    {
        return Client::query()
            ->where('email', $this->email)
            ->orWhere('phone', $this->phone)
            ->exists() ? 'Oui' : 'Non';
    }
    public static function getDataForDataTable()
    {
        $query = self::query()->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('is_client', function ($reservation) {
                return  $reservation->is_client;
            })
            ->addColumn('action', function ($reservation) {
                return view('back.reservation.actions', compact('reservation'))->render();
            })
            ->rawColumns(['action', 'is_client'])
            ->make(true);
    }

}
