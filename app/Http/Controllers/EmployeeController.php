<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Role;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
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
            'back.employee.index',
            [
                'records' => Employee::all()->where('deleted', "0")
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

        $viewsData['userRecords'] = \App\User::all()->where('deleted', '0');
        $viewsData['positionRecords'] = \App\Models\Position::all()->where('deleted', '0');
        $viewsData['specialityRecords'] = \App\Models\Speciality::all()->where('deleted', '0');

        return response()->view('back.employee.create', $viewsData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'email' => ['required', 'string', 'max:150'],
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            // Find the role with label "Employé"
            $role = Role::where('label', 'Employé')->first();
            if (!$role) {
                return redirect()->back()->withInput()->withErrors(['first_name' => 'Role Employé not found. Create it before creating a new employee.']);
            }
            // Check if user with this email already exists
            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return redirect()->back()->withInput()->withErrors(['email' => 'Email already exists.']);
            }

            // Generate unique login
            $login = $this->generateUniqueLogin();

            // Create user
            $user = User::create([
                'first_name' => $request->first_name,
                'name' => $request->last_name,
                'email' => $request->email,
                'login' => $login,
                'role' => $role->id, // Assign the role ID
                // Other user fields
            ]);

            // Create employee with user ID
            Employee::create(array_merge($request->except('email'), ['user_id' => $user->id]));

            return Redirect::to(route('employee.index'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param Employee $employee
     * @return Response
     */
    public function edit(Employee $employee): Response
    {
        $viewsData['record'] = $employee;

        $viewsData['userRecords'] = \App\User::all()->where('deleted', '0');
        $viewsData['positionRecords'] = \App\Models\Position::all()->where('deleted', '0');
        $viewsData['specialityRecords'] = \App\Models\Speciality::all()->where('deleted', '0');

        return response()->view('back.employee.edit', $viewsData);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Employee $employee
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Employee $employee, Request $request): RedirectResponse
    {
        //
        $data = $request->all();
        $rules = [
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:50'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        } else {
            $employee->update($request->all());
            Redirect::to(route('employee.index'))->send();
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Employee $employee
     * @return JsonResponse
     */
    public function destroy(Employee $employee): JsonResponse
    {
        $employee->update(['deleted' => 1, 'deleted_at' => date("Y-m-d H:i:s"), 'deleted_by' => Auth::user()->id]);
        return response()->json(['success' => true, 'message' => "L'enregistrement a été supprimé avec succès"]);
    }


    public function data()
    {
        return employee::getDataForDataTable();
    }


    private function generateUniqueLogin()
    {
        do {
            $login = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 10);
        } while (User::where('login', $login)->exists());

        return $login;
    }
}
