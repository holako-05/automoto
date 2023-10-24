<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Statut;
use App\Models\Service;
use App\Models\Reservation;
use App\Models\Typeservice;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getRules(): array
    {
        return [];
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $request->flash();
        return response()->view(
            'back.reservation.index',
            [
                'records' => Reservation::all()->where('deleted', "0")
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        $viewsData = [];
        $viewsData['statutRecords'] = Statut::getStatutByCode("reservation");
        $viewsData['serviceRecords'] = Service::all();
        $viewsData['typeserviceRecords'] = Typeservice::all();
        $viewsData['clientRecords'] = Client::all();
        return response()->view('back.reservation.create', $viewsData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function store(Request $request)
    {
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            Reservation::create($request->all());
            $notification = new Notification();
            $notification->title = "Reservation : " . $request->name;
            $notification->description = "Service : " . $request->service;
            $notification->notified = 0;
            $notification->save();

            Redirect::to(route('reservation.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Reservation $reservation
     * @return Response
     */
    public function edit(Reservation $reservation): Response
    {
        $viewsData['record'] = $reservation;
        $viewsData['statutRecords'] = Statut::getStatutByCode("reservation");
        $viewsData['serviceRecords'] = Service::all();
        $viewsData['typeserviceRecords'] = Typeservice::all();
        $viewsData['clientRecords'] = Client::all();

        return response()->view('back.reservation.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Reservation $reservation
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Reservation $reservation, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $reservation->update($request->all());
            Redirect::to(route('reservation.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reservation $reservation
     * @return JsonResponse
     */
    public function destroy(Reservation $reservation): JsonResponse
    {
        $reservation->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return reservation::getDataForDataTable();
    }
    public function createReservationClient($id): JsonResponse
    {
        $reservation = Reservation::findOrfail($id);
        return response()->json($reservation);
    }
    public function ReservationClientCreate(Request $request)
    {
        // Create the new client
        $client = new Client();
        $client->first_name = $request->first_name;
        $client->last_name = $request->last_name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;
        $client->save();
        Reservation::where('id',$request->reservation_id)->update(
            [
                "client_id" => $client->id
            ]
            );

        return response()->json(['success' => true, 'message' => 'Client created successfully']);
    }
    public function calender()
    {
        return response()->view('back.reservation.calender');
    }

    public function getClientDetails(Request $request)
{

    $client_id = $request->input('client_id');
    $client = Client::find($client_id);

    return response()->json($client);
}
}
