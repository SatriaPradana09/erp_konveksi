<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\BomController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RfqController;
use App\Http\Controllers\SQController;
use App\Http\Controllers\VendorController;
use Illuminate\Queue\Jobs\SqsJob;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Gd\Commands\RotateCommand;

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

// Route::get('/', function () {
//     return view('dashboard');
// });
//Dashboard
Route::get('/',[DashboardController::class,'tampilall'])->name('tampilall');
//Produk
Route::get('/produk',[ProdukController::class,'kabehProduk'])->name('Produk');
Route::get('/produkinput', [ProdukController::class,'produkInput'])->name('ProdukInput');
Route::post('/produkupload',[ProdukController::class,'produkUpload'])->name('UploadProduk');
Route::get('/produkedit/{id_produk}', [ProdukController::class,'produkEditView'])->name('ProdukEdit');
Route::put('/produkedit/edit/{id_produk}', [ProdukController::class,'produkUpdate'])->name('ProdukUpdate');
Route::delete('/produkdelete/{id_produk}',[ProdukController::class,'Produkdelete'])->name('DeleteProduk');
//BOM
Route::get('/bom', [BomController::class,'tampilBom'])->name('tampilBom');
Route::get('/bom-input', [BomController::class,'materialInput'])->name('MasukBOM');
Route::post('/bom/bomMasuk',[BomController::class,'uploadBOM']);
Route::put('/bom/bomUpdate',[BomController::class,'updateBOM']);
Route::get('/bom/delete/{kode_bom}',[BomController::class,'deletbom']);
Route::get('/bom/item_list/{kode_bom}',[BomController::class,'materialInputItems']);
Route::post('/bom/item_list/upload',[BomController::class,'uploadList']);
Route::get('/bom/delete_item_list/{kode_bom_list}',[BomController::class,'deleteList']);
?>



