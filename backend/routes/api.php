<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});auth.guard

Route::group(['prefix' => 'auth'], function () {
    Route::post('login/admin', [\App\Http\Controllers\Api\AuthController::class, 'adminLogin']);
    Route::post('login/company', [\App\Http\Controllers\Api\AuthController::class, 'companyLogin']);
});

Route::group(['middleware' => ['api', 'jwt.verify']], function () {

    /* *** START FOR ADMIN ROUTE *** */
    Route::group(['middleware' => 'assign.guard:admin'], function () {
        Route::post('/me/admin', [\App\Http\Controllers\Api\AuthController::class, 'meAdmin']);
        Route::post('logout/admin', [\App\Http\Controllers\Api\AuthController::class, 'logoutAdmin']);
        Route::post('refresh/admin', [\App\Http\Controllers\Api\AuthController::class, 'refreshAdmin']);

        /* *** CRUD FOR COMPANY ROUTE *** */
        Route::group(['namespace' => 'Admin',  'prefix' => 'companies'], function () {
            Route::get('/', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'index']);
//            Route::get('/companies/create', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'create']);
            Route::post('/', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'store']);
            Route::get('/{id}', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'show']);
            Route::get('/{id}/edit', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'edit']);
            Route::put('/{id}', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'update']);
            Route::delete('/{id}', [\App\Http\Controllers\Api\Admin\CompanyController::class, 'destroy']);
        });
    });

    /* *** START FOR COMPANY ROUTE *** */
    Route::group(['middleware' => 'assign.guard:company'], function () {
        Route::post('/me/company', [\App\Http\Controllers\Api\AuthController::class, 'meCompany']);
        Route::post('logout/company', [\App\Http\Controllers\Api\AuthController::class, 'logoutCompany']);
        Route::post('refresh/company', [\App\Http\Controllers\Api\AuthController::class, 'refreshCompany']);

        /* *** CRUD FOR EMPLOYEES ROUTE *** */
        Route::group(['namespace' => 'Company',  'prefix' => 'employees'], function () {
            Route::get('/', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'store']);
            Route::get('/{id}', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'show']);
            Route::get('/{id}/edit', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'edit']);
            Route::put('/{id}', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'update']);
            Route::delete('/{id}', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'destroy']);
        });
//        Route::get('/lists', [\App\Http\Controllers\Api\Company\EmployeeController::class, 'listOfCompany']);
    });
});


