<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
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
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(['companies' => Company::all()], $this->successStatus);
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
        //'company_name', 'company_head_name', 'address', 'email', 'website', 'phone'

        $validator = Validator::make($request->all(), [
            'company_name' => 'required',
            'company_head_name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'phone' => 'required|min:11|numeric',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->badRequestStatus);
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['is_company'] = 2;
        $company = Company::create($input);
        $id = $company->id;
//        dd($id);
        DB::table('user_role')->insert([
            'company_id' => $id,
            'role_id' => 2
        ]);
        $success['company_name'] = $company->company_name;
        $success['message'] = 'Company successfully registered';

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
        $company = Company::findOrFail($id);
        return response()->json(['company' => $company], $this->successStatus);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id): \Illuminate\Http\JsonResponse
    {
        $company = Company::findOrFail($id);
        return response()->json(['company' => $company], $this->successStatus);
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
            'company_name' => 'required',
            'company_head_name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'phone' => 'required|min:11|numeric',
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], $this->badRequestStatus);
        }

        Company::whereId($id)->update($request->all());
        return response()->json(['success' => 'Company updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Company::destroy($id);
        return response()->json(['success' => 'Company deleted  successfully']);
    }

}
