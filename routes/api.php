<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CollectionController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SizeController;
use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CompareController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FavoritesController;
use \App\Http\Controllers\Api\ProductController;
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
Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->post('logout',[AuthController::class,'logout']);


Route::middleware(['auth:sanctum','isAPIAdmin'])->group(function(){
    Route::get('/checkingAuthenticated', function (){
        return response()->json(['message'=>'You are in','status'=>200],200);
    });
    // category
    Route::post('store-category',[CategoryController::class,'store']);
    Route::get('view-category',[CategoryController::class,'index']);
    Route::get('edit-category/{id}',[CategoryController::class,'edit']);
    Route::put('update-category/{id}',[CategoryController::class,'update']);
    Route::get('delete-category/{id}',[CategoryController::class,'destroy']);
    Route::get('all-category',[CategoryController::class,'all_category']);
    //product
    Route::post('store-product',[ProductController::class,'store']);
    Route::get('view-product',[ProductController::class,'index']);
    Route::get('delete-product/{id}',[ProductController::class,'destroy']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::post('update-product/{id}',[ProductController::class,'update']);
    //brand
    Route::post('store-brand',[BrandController::class,'store']);
    Route::get('view-brand',[BrandController::class,'index']);
    Route::get('edit-brand/{id}',[BrandController::class,'edit']);
    Route::post('update-brand/{id}',[BrandController::class,'update']);
    Route::get('delete-brand/{id}',[BrandController::class,'destroy']);
    Route::get('all-brand',[BrandController::class,'all_brand']);
    //Color
    Route::get('view-color',[ColorController::class,'index']);
    Route::post('store-color',[ColorController::class,'store']);
    Route::get('edit-color/{id}',[ColorController::class,'edit']);
    Route::post('update-color/{id}',[ColorController::class,'update']);
    Route::get('delete-color/{id}',[ColorController::class,'destroy']);
    Route::get('all-color',[ColorController::class,'all_color']);
    //Size
    Route::get('view-size',[SizeController::class,'index']);
    Route::post('store-size',[SizeController::class,'store']);
    Route::get('edit-size/{id}',[SizeController::class,'edit']);
    Route::post('update-size/{id}',[SizeController::class,'update']);
    Route::get('delete-size/{id}',[SizeController::class,'destroy']);
    Route::get('all-size',[SizeController::class,'all_size']);
    //Collection
    Route::get('view-collection',[CollectionController::class,'index']);
    Route::post('store-collection',[CollectionController::class,'store']);
    Route::get('edit-collection/{id}',[CollectionController::class,'edit']);
    Route::post('update-collection/{id}',[CollectionController::class,'update']);
    Route::get('delete-collection/{id}',[CollectionController::class,'destroy']);
    //Coupon
    Route::get('view-coupon',[CouponController::class,'index']);
    Route::post('store-coupon',[CouponController::class,'store']);
    Route::get('edit-coupon/{id}',[CouponController::class,'edit']);
    Route::post('update-coupon/{id}',[CouponController::class,'update']);
    Route::get('delete-coupon/{id}',[CouponController::class,'destroy']);
    //Post
    Route::get('view-post',[\App\Http\Controllers\Api\PostController::class,'index']);
    Route::post('store-post',[\App\Http\Controllers\Api\PostController::class,'store']);
    Route::get('edit-post/{id}',[\App\Http\Controllers\Api\PostController::class,'edit']);
    Route::post('update-post/{id}',[\App\Http\Controllers\Api\PostController::class,'update']);
    Route::get('delete-post/{id}',[\App\Http\Controllers\Api\PostController::class,'destroy']);
    //Order
    Route::get('order',[OrderController::class,'index']);

});
Route::get('view-product',[ProductController::class,'all_product_new']);
Route::get('getCategory',[FrontendController::class,'category']);
Route::get('getBrand',[FrontendController::class,'brand']);
Route::get('getColor',[FrontendController::class,'color']);
Route::get('getPriceProduct',[FrontendController::class,'price_product']);
Route::get('getProduct',[FrontendController::class,'product']);
Route::get('getProductByCategory/{id}',[FrontendController::class,'product_category']);
Route::get('getProductBySlug/{slug}',[FrontendController::class,'product_detail']);
Route::get('getAllColor',[FrontendController::class,'all_color']);
Route::get('getCollection',[FrontendController::class,'collection']);
Route::get('getCategoryByCollection/{id}',[FrontendController::class,'category_collection']);
Route::get('getProductByCollection/{id}',[FrontendController::class,'product_by_collection']);
Route::get('getProductByCategorySlug/{slug}',[FrontendController::class,'product_by_category']);
Route::get('getCategoryBySlug/{slug}',[FrontendController::class,'category_by_slug']);
Route::post('email',[FrontendController::class,'email']);
Route::post('add-to-cart',[CartController::class,'add_to_cart']);
Route::get('show-cart',[CartController::class,'index']);
Route::get('delete-cart/{id}',[CartController::class,'destroy']);
Route::post('add-comment',[CommentController::class,'store']);
Route::get('show-comment/{id}',[CommentController::class,'show_comment']);
Route::get('view-comment',[CommentController::class,'index']);
Route::get('getProductIdBySlug/{slug}',[CommentController::class,'getProductIdBySlug']);
Route::get('search/{name}', [FrontendController::class, 'search_product_by_name']);
Route::post('add-favorites',[FavoritesController::class,'store']);
Route::get('view-favorites',[FavoritesController::class,'index']);
Route::get('delete-favorites/{id}',[FavoritesController::class,'destroy']);
Route::get('all-size',[SizeController::class,'all_size']);
Route::post('add-to-compare',[CompareController::class,'store']);
Route::get('view-compare',[CompareController::class,'index']);
Route::post('place-order',[CheckoutController::class,'placeorder']);
Route::post('apply-coupon',[CouponController::class,'apply_coupon']);
Route::get('all-post',[PostController::class,'all_post']);
Route::get('product-by-slug/{slug}',[PostController::class,'postbyslug']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
