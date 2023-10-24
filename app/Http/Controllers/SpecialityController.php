<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class SpecialityController extends Controller
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
        return response()->view('back.speciality.index',
            [
                'records' => Speciality::all()->where('deleted', "0")
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
        

        return response()->view('back.speciality.create', $viewsData);
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
            Speciality::create($request->all());
            Redirect::to(route('speciality.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Speciality $speciality
     * @return Response
     */
    public function edit(Speciality $speciality): Response
    {
        $viewsData['record'] = $speciality;
        

        return response()->view('back.speciality.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Speciality $speciality
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Speciality $speciality, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $speciality->update($request->all());
            Redirect::to(route('speciality.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Speciality $speciality
     * @return JsonResponse
     */
    public function destroy(Speciality $speciality): JsonResponse
    {
        $speciality->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return speciality::getDataForDataTable();
            }

}
