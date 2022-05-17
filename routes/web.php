<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SingleActionController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Http\Request;

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

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', function() {
    //echo "Hello Word!!";
    return view('demo');
});

Route::get('/demo/{name}', function($name) {
    echo $name;
});

Route::get('/demo/{name}/{id?}', function($name,$id = null) {
    echo $name . " ";
    echo $id;
});

Route::get('/demo/{name}/{id?}', function($name,$id = null) {
    $data = compact('name','id');
    //print_r($data);
    return view('demo')->with($data);
});

//Route::post('/test', function() {
Route::any('/test', function() {
    echo "Testing the route";
});

//Route::put('users/{id}', function(){
//});

//Route::patch();

//Route::delete('users/{id}', function(){
//});

Route::get('/{name?}', function ($name = null) {
    $demo = "<h2>Abhishek Tech</h2>";
    $data = compact('name','demo');
    return view('home')->with($data);
});

Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/course', function () {
    return view('courses');
});

//Laravel 8 Version
Route::get('/',[DemoController::class,'index']);
Route::get('/about','App\Http\Controllers\DemoController@about');
Route::get('/course',SingleActionController::class);

Route::resource('photo',PhotoController::class);
*/

/*--- Belove Not Supported --*/
//Laravel 7 Version
//Route::get('/about','DemoController@about');

//Route::get('/about','DemoController::about');

// Route::get('/register',[RegistrationController::class,'index']);
// Route::post('/register',[RegistrationController::class,'register']);

// Route::get('/customer',function(){
//     $customers = Customer::all();
//     echo "<pre>";
//     print_r($customers->toArray());
// });

Route::get('/', function () {
    return view('index');
});

Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);

Route::get('/customer/create',[CustomerController::class,'create'])->name('customer.create');
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/force-delete/{id}',[CustomerController::class,'forceDelete'])->name('customer.force-delete');
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer',[CustomerController::class,'view']);
Route::get('/customer/trash',[CustomerController::class,'trash'])->name('customer.trash');
Route::post('/customer',[CustomerController::class,'store']);

Route::get('/get-all-session',function(){
    $session = session()->all();
    prx($session);
});

Route::get('/set-session',function(Request $request){
    $request->session()->put('user_name','Abhishek Choksi');
    $request->session()->put('user_id','123');
    $request->session()->flash('status','Success');
    return redirect('get-all-session');
});

Route::get('/destroy-session',function(Request $request){
    session()->forget(['user_name','user_id']);
    //session()->forget('user_id');
    return redirect('get-all-session');
});

Route::get('/upload',[FileUploadController::class,'index']);
Route::post('/upload',[FileUploadController::class,'upload']);
