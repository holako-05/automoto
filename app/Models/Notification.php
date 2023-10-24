<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $guarded = [];

    


    public static function getDataForDataTable()
            {
                $query = self::query()->where('deleted', '0');

                return DataTables::of($query)
                    
                    ->addColumn('action', function ($notification) {
                        return view('back.notification.actions', compact('notification'))->render();
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

}
