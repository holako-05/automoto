<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modele;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ModeleController extends Controller
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
            'back.modele.index',
            [
                'records' => Modele::all()->where('deleted', "0")
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

        $viewsData['marqueRecords'] = \App\Models\Marque::all()->where('deleted', '0');

        return response()->view('back.modele.create', $viewsData);
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
            Modele::create($request->all());
            Redirect::to(route('modele.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Modele $modele
     * @return Response
     */
    public function edit(Modele $modele): Response
    {
        $viewsData['record'] = $modele;

        $viewsData['marqueRecords'] = \App\Models\Marque::all()->where('deleted', '0');

        return response()->view('back.modele.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Modele $modele
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Modele $modele, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $modele->update($request->all());
            Redirect::to(route('modele.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Modele $modele
     * @return JsonResponse
     */
    public function destroy(Modele $modele): JsonResponse
    {
        $modele->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return modele::getDataForDataTable();
    }

    public function getModelesByMarque($marqueId)
    {
        $modeles = Modele::where('marque_id', $marqueId)->get(['id', 'title']);
        return response()->json($modeles);
    }
}
