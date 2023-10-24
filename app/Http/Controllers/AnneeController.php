<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class AnneeController extends Controller
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
        return response()->view('back.annee.index',
            [
                'records' => Annee::all()->where('deleted', "0")
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
        

        return response()->view('back.annee.create', $viewsData);
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
            Annee::create($request->all());
            Redirect::to(route('annee.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Annee $annee
     * @return Response
     */
    public function edit(Annee $annee): Response
    {
        $viewsData['record'] = $annee;
        

        return response()->view('back.annee.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Annee $annee
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Annee $annee, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $annee->update($request->all());
            Redirect::to(route('annee.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Annee $annee
     * @return JsonResponse
     */
    public function destroy(Annee $annee): JsonResponse
    {
        $annee->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return annee::getDataForDataTable();
            }

}
