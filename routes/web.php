<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUkmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\BiografyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriModulController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'Home']);
Route::get('/biografy', [BiografyController::class, 'Biografy']);
Route::get('/galery', [GaleryController::class, 'Galery']);
Route::get('/tentang', [AboutController::class, 'About']);
Route::get('/login', [AuthController::class, 'Login']);
Route::get('/register', [AuthController::class, 'Register']);
Route::get('/kontak', [ContactController::class, 'Contact']);
Route::get('/dashboard', function () {
    return view('superadmin.dashboard');
});

Route::get('/users', [UserController::class, 'AllUser']);
Route::get('/useruuid/{uuid}', [UserController::class, 'UserByUuid']);
Route::post('/adduser', [UserController::class, 'AddUser']);
Route::post('/updateuser', [UserController::class, 'UpdateUser']);
Route::get('/deleteuser/{uuid}', [UserController::class, 'DeleteUser']);

Route::get('/kelas', [KelasController::class, 'Allkelas']);
Route::post('/addkelas', [KelasController::class, 'AddKelas']);
Route::post('/updatekelas', [KelasController::class, 'UpdateKelas']);
Route::get('/deletekelas/{uuid}', [KelasController::class, 'DeleteKelas']);

Route::get('/kategorimodul', [KategoriModulController::class, 'AllKategoriModul']);
Route::post('/addkategorimodul', [KategoriModulController::class, 'AddKategoriModul']);
Route::post('/updatekategorimodul', [KategoriModulController::class, 'UpdateKategoriModul']);
Route::get('/deletekategorimodul/{uuid}', [KategoriModulController::class, 'DeleteKategoriModul']);

Route::get('/kategorikegiatan', [KategoriKegiatanController::class, 'AllKategoriKegiatan']);
Route::post('/addkategorikegiatan', [KategoriKegiatanController::class, 'AddKategoriKegiatan']);
Route::post('/updatekategorikegiatan', [KategoriKegiatanController::class, 'UpdateKategoriKegiatan']);
Route::get('/deletekategorikegiatan/{uuid}', [KategoriKegiatanController::class, 'DeleteKategoriKegiatan']);




Route::get('/bidang', [BidangController::class, 'AllBidang']);
Route::post('/addbidang', [BidangController::class, 'AddBidang']);
Route::post('/updatebidang', [BidangController::class, 'UpdateBidang']);
Route::get('/deletebidang/{uuid}', [BidangController::class, 'DeleteBidang']);

Route::get('/profesi', [ProfesiController::class, 'AllProfesi']);
Route::post('/addprofesi', [ProfesiController::class, 'AddProfesi']);
Route::post('/updateprofesi', [ProfesiController::class, 'UpdateProfesi']);
Route::get('/deleteprofesi/{uuid}', [ProfesiController::class, 'DeleteProfesi']);

Route::get('/ukm', [AboutUkmController::class, 'AllAboutUkm']);
Route::get('/ukmbyuuid/{uuid}', [AboutUkmController::class, 'ByUuidAboutUkm']);
Route::post('/addukm', [AboutUkmController::class, 'AddAboutUkm']);
Route::post('/updateukm', [AboutUkmController::class, 'UpdateAboutUkm']);
Route::get('/deleteukm/{uuid}', [AboutUkmController::class, 'DeleteAboutUkm']);
