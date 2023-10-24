<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
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
        return response()->view('back.service.index',
            [
                'records' => Service::all()->where('deleted', "0")
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
        
		$viewsData['typeserviceRecords'] = \App\Models\Typeservice::all()->where('deleted','0');

        return response()->view('back.service.create', $viewsData);
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
            Service::create($request->all());
            Redirect::to(route('service.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Service $service
     * @return Response
     */
    public function edit(Service $service): Response
    {
        $viewsData['record'] = $service;
        
		$viewsData['typeserviceRecords'] = \App\Models\Typeservice::all()->where('deleted','0');

        return response()->view('back.service.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Service $service
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Service $service, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $service->update($request->all());
            Redirect::to(route('service.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Service $service
     * @return JsonResponse
     */
    public function destroy(Service $service): JsonResponse
    {
        $service->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return service::getDataForDataTable();
            }

}
