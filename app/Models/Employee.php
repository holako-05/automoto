<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [];

    public function userDetail()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    public function positionDetail()
    {
        return $this->belongsTo(\App\Models\Position::class, 'position');
    }


    public static function getDataForDataTable()
    {
        $query = self::with(['userDetail', 'positionDetail'])
            ->join('positions', 'employees.position', '=', 'positions.id')
            ->join('users', 'employees.user_id', '=', 'users.id')
            ->where('employees.deleted', '0');

        return DataTables::of($query)
            ->addColumn('user_id', function ($employee) {
                return $employee->userDetail->login;
            })
            ->addColumn('position', function ($employee) {
                return $employee->positionDetail->label;
            })
            ->addColumn('action', function ($employee) {
                return view('back.employee.actions', compact('employee'))->render();
            })
            ->filterColumn('position', function ($query, $keyword) {
                $query->where('positions.label', 'like', "%{$keyword}%");
            })
            ->filterColumn('user_id', function ($query, $keyword) {
                $query->where('users.login', 'like', "%{$keyword}%");
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
