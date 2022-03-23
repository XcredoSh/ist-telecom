<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Exception;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\JWTAuth;
class AuthController extends Controller
{

    /* *** START FOR ADMIN SERVICE *** */
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function adminLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:4'
        ]);

        $credentials = request(['email', 'password']);


        if (! $token = Auth::guard('admin')->attempt($credentials)) {
            return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function meAdmin(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Auth::user());
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutAdmin(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshAdmin(): \Illuminate\Http\JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }
    /* *** END FOR ADMIN SERVICE *** */



    /* *** START FOR COMPANY SERVICE *** */
    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function companyLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
        $credentials = $request->only('email', 'password');

        if (!$token = Auth::guard('company')->attempt($credentials)) {
            return response()->json(['success' => false, 'error' => 'Unauthorized'], 401);
        }
        return $this->respondWithCompanyToken($token);
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function meCompany(): \Illuminate\Http\JsonResponse
    {
        $id = Auth::user()->id;
        $c = Company::select('id','company_name as name', 'company_head_name', 'address', 'email', 'website', 'phone', 'is_company', 'created_at', 'updated_at' )->where('id', $id)->first();
        return response()->json($c);
    }
    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logoutCompany(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refreshCompany(): \Illuminate\Http\JsonResponse
    {
        return $this->respondWithCompanyToken(auth()->refresh());
    }
    /* *** END FOR COMPANY SERVICE *** */


    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 24,
            'user' => \auth()->user()
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithCompanyToken($token): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 24,
            'user' => Auth::user()
        ]);
    }
}
