<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture_article;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Facture_articleController extends Controller
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
        return response()->view('back.facture_article.index',
            [
                'records' => Facture_article::all()->where('deleted', "0")
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
        
		$viewsData['factureRecords'] = \App\Models\Facture::all()->where('deleted','0');

        return response()->view('back.facture_article.create', $viewsData);
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
            Facture_article::create($request->all());
            Redirect::to(route('facture_article.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Facture_article $facture_article
     * @return Response
     */
    public function edit(Facture_article $facture_article): Response
    {
        $viewsData['record'] = $facture_article;
        
		$viewsData['factureRecords'] = \App\Models\Facture::all()->where('deleted','0');

        return response()->view('back.facture_article.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Facture_article $facture_article
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Facture_article $facture_article, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $facture_article->update($request->all());
            Redirect::to(route('facture_article.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Facture_article $facture_article
     * @return JsonResponse
     */
    public function destroy(Facture_article $facture_article): JsonResponse
    {
        $facture_article->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return facture_article::getDataForDataTable();
            }

}
