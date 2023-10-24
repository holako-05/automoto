<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reception_product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Reception_productController extends Controller
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
        return response()->view('back.reception_product.index',
            [
                'records' => Reception_product::all()->where('deleted', "0")
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
        
		$viewsData['receptionRecords'] = \App\Models\Reception::all()->where('deleted','0');
		$viewsData['productRecords'] = \App\Models\Product::all()->where('deleted','0');

        return response()->view('back.reception_product.create', $viewsData);
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
            Reception_product::create($request->all());
            Redirect::to(route('reception_product.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Reception_product $reception_product
     * @return Response
     */
    public function edit(Reception_product $reception_product): Response
    {
        $viewsData['record'] = $reception_product;
        
		$viewsData['receptionRecords'] = \App\Models\Reception::all()->where('deleted','0');
		$viewsData['productRecords'] = \App\Models\Product::all()->where('deleted','0');

        return response()->view('back.reception_product.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Reception_product $reception_product
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Reception_product $reception_product, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $reception_product->update($request->all());
            Redirect::to(route('reception_product.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reception_product $reception_product
     * @return JsonResponse
     */
    public function destroy(Reception_product $reception_product): JsonResponse
    {
        $reception_product->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return reception_product::getDataForDataTable();
            }

}
