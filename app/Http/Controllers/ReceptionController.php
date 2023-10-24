<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Reception;
use App\Models\Reception_product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ReceptionController extends Controller
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
            'back.reception.index',
            [
                'records' => Reception::all()->where('deleted', "0")
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
        $viewsData['products'] = Product::all();

        return response()->view('back.reception.create', $viewsData);
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
        // dd($request->products);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // Start a database transaction
            DB::beginTransaction();

            try {
                // Create a new Reception record
                $reception = new Reception();
                $reception->received_date = $request->input('received_date');
                $reception->description = $request->input('description');
                $reception->save();

                // Loop through each product to create ProductReservation records
                foreach ($request->products as $product) {
                    $productId = $product['product_id'];
                    $productQuantity = $product['quantity'];

                    // Update the product stock
                    $product = Product::find($productId);
                    if ($product->type === 'stockable') {
                        $product->stock_quantity += $productQuantity;  // Adjust as needed
                        $product->save();
                    }

                    // Create a new ReceptionProduct record
                    $receptionProduct = new Reception_product();
                    $receptionProduct->reception_id = $reception->id;
                    $receptionProduct->product_id = $productId;
                    $receptionProduct->receiver_quantity = $productQuantity;
                    $receptionProduct->save();
                }

                // Commit the transaction
                DB::commit();

                return redirect()->route('reception.index')->with('success', 'Reception successfully created.');
            } catch (\Exception $e) {
                // Rollback the transaction in case of errors
                DB::rollback();

                // For debugging
                dd($e->getMessage());

                return redirect()->back()->with('error', 'An error occurred while creating the Reception.');
            }
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Reception $reception
     * @return Response
     */
    public function edit(Reception $reception): Response
    {
        $viewsData['record'] = $reception;
        $viewsData['products'] = Product::all();

        return response()->view('back.reception.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Reception $reception
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Reception $reception, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $reception->update($request->all());
            Redirect::to(route('reception.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reception $reception
     * @return JsonResponse
     */
    public function destroy(Reception $reception): JsonResponse
    {
        $reception->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return reception::getDataForDataTable();
    }
}
