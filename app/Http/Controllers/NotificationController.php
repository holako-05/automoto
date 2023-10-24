<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class NotificationController extends Controller
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
        return response()->view('back.notification.index',
            [
                'records' => Notification::all()->where('deleted', "0")
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


        return response()->view('back.notification.create', $viewsData);
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
            Notification::create($request->all());
            Redirect::to(route('notification.index'))->send();
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Notification $notification
     * @return Response
     */
    public function edit(Notification $notification): Response
    {
        $viewsData['record'] = $notification;


        return response()->view('back.notification.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Notification $notification
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Notification $notification, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $notification->update($request->all());
            Redirect::to(route('notification.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Notification $notification
     * @return JsonResponse
     */
    public function destroy(Notification $notification): JsonResponse
    {
        $notification->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }

    public function checkNewNotification($type)
    {
        $new_notification = Notification::where('notified',0)->get();
        if($type == 1){
            foreach($new_notification as $notification) {
                $notification->notified = 1;
                $notification->save();
            }
        }
        return response()->json(['new_reservations' => $new_notification]);
    }
    public function data()
            {
               return notification::getDataForDataTable();
            }

}
