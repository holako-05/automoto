<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CategorieController extends Controller
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
        return response()->view('back.categorie.index',
            [
                'records' => Categorie::all()->where('deleted', "0")
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
        

        return response()->view('back.categorie.create', $viewsData);
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
            Categorie::create($request->all());
            Redirect::to(route('categorie.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Categorie $categorie
     * @return Response
     */
    public function edit(Categorie $categorie): Response
    {
        $viewsData['record'] = $categorie;
        

        return response()->view('back.categorie.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Categorie $categorie
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Categorie $categorie, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $categorie->update($request->all());
            Redirect::to(route('categorie.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Categorie $categorie
     * @return JsonResponse
     */
    public function destroy(Categorie $categorie): JsonResponse
    {
        $categorie->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return categorie::getDataForDataTable();
            }

}
