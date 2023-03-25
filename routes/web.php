<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReportController;

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

Route::get('/', function () {
    if(!empty(Auth::user()->id)){
        return redirect('home');
    }
    return view('auth/signIn');
});

Route::get('register_service_provider',[\App\Http\Controllers\SellerController::class,'create'])->name('register_service_provider');
Route::post('create_service_provider',[\App\Http\Controllers\SellerController::class,'store'])->name('create_service_provider');
 
Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class, 'index']);

Auth::routes();

 Route::view('auth/signIn', 'sessions.signIn')->name('signIn');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//FileUpload routes
Route::resource('upload', UploadController::class);
Route::get('get_uploaded_files', [App\Http\Controllers\UploadController::class, 'get_uploaded_files'])->name('get_uploaded_files');
Route::post('upload_file', [App\Http\Controllers\UploadController::class, 'upload'])->name('upload_file');

//Category 
Route::resource('category', CategoryController::class);
Route::post('image_upload', [CategoryController::class, 'image_upload'])->name('image_upload');

//SubCategory 
Route::resource('subcategory', SubCategoryController::class);

//Items
Route::resource('item',ItemController::class);
Route::get('item.create',[ItemController::class,'create'])->name('item.create');
Route::post('item_image', [ItemController::class, 'item_image'])->name('item_image');
 
//calender
Route::get('calender',[CalenderController::class,'index'])->name('calender');

//Banner routes
Route::resource('banner', BannerController::class);


//Booking routes
Route::resource('booking', BookingController::class);



//Booking routes
Route::resource('report', ReportController::class);

//report
