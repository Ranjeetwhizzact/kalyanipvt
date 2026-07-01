<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\admin\ApiController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\SubCategoryController;
use App\Http\Controllers\admin\ProductUseage;
use App\Http\Controllers\admin\TesimonalController;
use App\Http\Controllers\admin\NewsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
// Route::options('/{any}', function () {
//     return response('', 200)
//         ->header('Access-Control-Allow-Origin', '*')
//         ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
//         ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
// })->where('any', '.*');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('/products', [ApiController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'getCategoriesWithSubcategories']);
Route::get('/category/{id}', [CategoryController::class, 'getCategorybyid']);
Route::get('/subcatgory/{id}', [SubCategoryController::class, 'getSubcategoryById']);
Route::get('/product/{id}', [ProductUseage::class, 'getProductById']);
Route::get('/testimonal', [TesimonalController::class, 'gettestimonal']);
Route::get('/news', [NewsController::class, 'getnews']);