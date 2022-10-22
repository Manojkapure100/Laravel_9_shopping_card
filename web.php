<?php

use App\Http\Controllers\mycontroller;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\View\admin;
use Illuminate\Contracts\View\View\manager\managedata;
use Illuminate\Support\Facades\Route;
// use resources\views\manage\managedata;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// To Call View From resources/views folder
Route::get('/', function () {
    return view('welcome');
});

// ajax routes
Route::get("needsc/{val}",[mycontroller::class,"needsc"]);
Route::get("custhomeajax/{val}",[mycontroller::class,"custhomeajax"]);
Route::get("myp/{val}",[mycontroller::class,"myp"]);
Route::get("storeid/{pid}/{qty}",[mycontroller::class,"storeid"]);
Route::get("chkname/{val}",[mycontroller::class,"chkname"]);
Route::get("getorderdatewise/{from}/{to}",[mycontroller::class,"getorderdatewise"]);
Route::get("getorderall",[mycontroller::class,"getorderall"]);
// getallorder
// chkname
// getorderdatewise

// registrationcheck
Route::post("registrationcheck",[mycontroller::class,"registrationcheck"]);
// Route::get("view1", function () {   // Url Name Must be same
//     return view("view1");           // File Name must be same
// });
// Route::get("view2", function () {
//     return view("view2");
// });
// Route::get("login",function(){
//     return view("login");
// });
Route::view("login","login");
Route::view("registeration","registeration");
// registeration

// Route::view("adminHomepage","adminHomepage");
Route::get("adminHomepage",[mycontroller::class,"adminHomepage"]);

Route::get("adminCategory",[mycontroller::class,"adminCategory"]);
Route::post("addCategory",[mycontroller::class,"addCategory"]);

Route::get("adminSubcategory",[mycontroller::class,"adminSubcategory"]);
Route::post("addSubcategory",[mycontroller::class,"addSubcategory"]);

Route::get("adminProduct",[mycontroller::class,"adminProduct"]);
Route::post("addProduct",[mycontroller::class,"addProduct"]);

// Route::view("adminCategory","adminCategory");
// Route::view("adminSubcategory","adminSubcategory");
// Route::view("adminProduct","adminProduct");

Route::get("customerHomepage",[mycontroller::class,"customerHomepage"]);
//Route::view("customerHomepage","customerHomepage");

Route::get("cart",[mycontroller::class,"cart"]);
//Route::view("cart","cart");

Route::post("loginCheck",[mycontroller::class,"loginCheck"]);


// To Call View From resources/views/manage folder
Route::get("managedata",function(){
    return view("\manage\managedata");
});


// Route::post("login-user",[mycontroller::class,"login"])->name("loginn");
Route::post("data",[mycontroller::class,"getdata"]);



// To Call Controller From http/controller folder

Route::get("/header",[mycontroller::class,"callheader"]);
Route::get("abc",[mycontroller::class,"callview1"]);

// No Need to Make Router For Components