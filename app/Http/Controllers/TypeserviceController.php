<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Typeservice;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class TypeserviceController extends Controller
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
        return response()->view('back.typeservice.index',
            [
                'records' => Typeservice::all()->where('deleted', "0")
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
        

        return response()->view('back.typeservice.create', $viewsData);
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
            Typeservice::create($request->all());
            Redirect::to(route('typeservice.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Typeservice $typeservice
     * @return Response
     */
    public function edit(Typeservice $typeservice): Response
    {
        $viewsData['record'] = $typeservice;
        

        return response()->view('back.typeservice.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Typeservice $typeservice
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Typeservice $typeservice, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $typeservice->update($request->all());
            Redirect::to(route('typeservice.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Typeservice $typeservice
     * @return JsonResponse
     */
    public function destroy(Typeservice $typeservice): JsonResponse
    {
        $typeservice->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return typeservice::getDataForDataTable();
            }

}
