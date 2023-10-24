<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Facture;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class FactureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function getRules(): array
    {
        return [
        ];
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
        return response()->view('back.facture.index',
            [
                'records' => Facture::all()->where('deleted', "0")
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
        $viewsData['companyRecords'] = Company::first();
        return response()->view('back.facture.create', $viewsData);
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
            Facture::create($request->all());
            Redirect::to(route('facture.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Facture $facture
     * @return Response
     */
    public function edit(Facture $facture): Response
    {
        $viewsData['record'] = $facture;


        return response()->view('back.facture.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Facture $facture
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Facture $facture, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $facture->update($request->all());
            Redirect::to(route('facture.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Facture $facture
     * @return JsonResponse
     */
    public function destroy(Facture $facture): JsonResponse
    {
        $facture->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }

    public function editFacture($client){

        $viewsData['companyRecords'] = Company::first();
        $viewsData['clientRecords'] = Client::findOrFail($client);


        return response()->view('back.facture.create', $viewsData);
    }
    public function createFacture(Request $request){
dd($request);
    }
    public function data()
            {
               return facture::getDataForDataTable();
            }

}
