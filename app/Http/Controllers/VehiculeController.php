<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class VehiculeController extends Controller
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
            'back.vehicule.index',
            [
                'records' => Vehicule::all()->where('deleted', "0")
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request): Response
    {
        $viewsData = [];
        // $clientId = $request->input('client_id');
        $viewsData['clientRecords'] = \App\Models\Client::all()->where('deleted', '0');
        $viewsData['marqueRecords'] = \App\Models\Marque::all()->where('deleted', '0');
        $viewsData['modeleRecords'] = \App\Models\Modele::all()->where('deleted', '0');
        $viewsData['anneeRecords'] = \App\Models\Annee::all()->where('deleted', '0');
        $viewsData['clientId'] = $request->input('client_id');

        return response()->view('back.vehicule.create', $viewsData);
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
            $vehicule = Vehicule::create($request->all());
            Redirect::to(route('vehicule.edit', $vehicule->id))->send()->with('status', 'Véhicule crée avec succès.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Vehicule $vehicule
     * @return Response
     */
    public function edit(Vehicule $vehicule): Response
    {
        $viewsData['record'] = $vehicule;

        $viewsData['clientRecords'] = \App\Models\Client::all()->where('deleted', '0');
        $viewsData['marqueRecords'] = \App\Models\Marque::all()->where('deleted', '0');
        $viewsData['modeleRecords'] = \App\Models\Modele::all()->where('deleted', '0');
        $viewsData['anneeRecords'] = \App\Models\Annee::all()->where('deleted', '0');

        return response()->view('back.vehicule.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Vehicule $vehicule
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Vehicule $vehicule, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $vehicule->update($request->all());
            // Redirect::to(route('vehicule.index'))->send();
        }
        return redirect()->back()->with('status', 'Véhicule modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Vehicule $vehicule
     * @return JsonResponse
     */
    public function destroy(Vehicule $vehicule): JsonResponse
    {
        $vehicule->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return vehicule::getDataForDataTable();
    }
}
