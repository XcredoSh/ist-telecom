<?php

namespace App\Http\Controllers\Api\Company;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public $successStatus = 200;
    public $createdStatus = 201;
    public $acceptedStatus = 202;
    public $badRequestStatus = 400;
    public $notFound = 404;

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:company');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['employees' => Employee::all()], $this->successStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        //'last_name', 'first_name', 'sur_name', 'position', 'passport_serial', 'passport_number', 'phone', 'address'. 'company_id'

        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
            'first_name' => 'required',
            'sur_name' => 'required',
            'position' => 'required',
            'passport_serial' => 'required',
            'passport_number' => 'required|numeric',
            'phone' => 'required|min:11|numeric',
            'address' => 'required',
            'company_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->badRequestStatus);
        }
        $input = $request->all();
        $employee = Employee::create($input);
        $success['employee'] = $employee->last_name .' '. $employee->first_name .' '. $employee->sur_name;
        $success['message'] = 'Employee successfully registered';
        return response()->json(['success' => $success], $this->createdStatus);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id): \Illuminate\Http\JsonResponse
    {
        $employee = Employee::findOrFail($id);
        return response()->json(['employee' => $employee], $this->successStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id): \Illuminate\Http\JsonResponse
    {
        $employee = Employee::findOrFail($id);
        return response()->json(['employee' => $employee], $this->successStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'last_name' => 'required',
            'first_name' => 'required',
            'sur_name' => 'required',
            'position' => 'required',
            'passport_serial' => 'required',
            'passport_number' => 'required|numeric',
            'phone' => 'required|min:11|numeric',
            'address' => 'required',
            'company_id' => 'required|numeric',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->badRequestStatus);
        }

        Employee::whereId($id)->update($request->all());
        return response()->json(['success' => 'Employee updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Employee::destroy($id);
        return response()->json(['success' => 'Employee deleted  successfully']);
    }

    public function listOfCompany(): \Illuminate\Http\JsonResponse
    {
        $employees = Company::find(1)->employees;
        return response()->json(['success' => true, 'employees' => $employees]);
    }
}
