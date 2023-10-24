<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\DataTables;

class Client extends Model
{
    protected $table = 'clients';
    protected $guarded = [];


    public function vehicules()
    {
        return $this->hasMany('App\Models\Vehicule');
    }
    public function reservations()
    {
        return $this->hasMany('App\Models\Reservation');
    }

    public static function getDataForDataTable()
    {
        $query = self::query()->where('deleted', '0');

        return DataTables::of($query)
            ->addColumn('client', function ($client) {
                $initial = mb_substr($client->last_name, 0, 1) . mb_substr($client->first_name, 0, 1);
                $photo = "<span class=\"avatar-initial rounded-circle bg-label-primary\">$initial</span>";
                $href = route('client.edit', ['client' => $client->id]);
                return <<<HTML
                    <div class="d-flex justify-content-left align-items-center">
                        <div class="avatar-wrapper">
                            <div class="avatar avatar-sm me-3">
                            $photo
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <a href="$href" class="text-body text-truncate">
                            <span class="fw-medium">$client->last_name $client->first_name</span></a>
                            <!-- <small class="text-muted">$client->vip</small> -->
                        </div>
                    </div>
            HTML;
            })
            ->addColumn('action', function ($client) {
                return view('back.client.actions', compact('client'))->render();
            })
            ->filterColumn('client', function ($query, $keyword) {
                $query->where(function ($query) use ($keyword) {
                    $query->where('clients.last_name', 'like', "%{$keyword}%")
                        ->orWhere('clients.first_name', 'like', "%{$keyword}%");
                });
            })
            ->rawColumns(['action', 'client'])
            ->make(true);
    }
}
