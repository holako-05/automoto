<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
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
            'back.client.index',
            [
                'records' => Client::all()->where('deleted', "0")
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


        return response()->view('back.client.create', $viewsData);
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
            $client = Client::create($request->all());
            Redirect::to(route('client.edit',$client->id))->send()->with('status','Client crée avec succès.');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return Response
     */
    public function edit(Client $client): Response
    {
        $viewsData['record'] = $client;


        // dd($client->reservations);

        return response()->view('back.client.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Client $client
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Client $client, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $client->update($request->all());
            Redirect::to(route('client.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return JsonResponse
     */
    public function destroy(Client $client): JsonResponse
    {
        $client->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return client::getDataForDataTable();
    }
}
