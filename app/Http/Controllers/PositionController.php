<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Position;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class PositionController extends Controller
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
        return response()->view('back.position.index',
            [
                'records' => Position::all()->where('deleted', "0")
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
        

        return response()->view('back.position.create', $viewsData);
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
            Position::create($request->all());
            Redirect::to(route('position.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Position $position
     * @return Response
     */
    public function edit(Position $position): Response
    {
        $viewsData['record'] = $position;
        

        return response()->view('back.position.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Position $position
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Position $position, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $position->update($request->all());
            Redirect::to(route('position.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Position $position
     * @return JsonResponse
     */
    public function destroy(Position $position): JsonResponse
    {
        $position->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
            {
               return position::getDataForDataTable();
            }

}
