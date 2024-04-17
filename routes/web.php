<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutUkmController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\BiografyController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeSetupController;
use App\Http\Controllers\KategoriModulController;
use App\Http\Controllers\KategoriKegiatanController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasMemberController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ProfesiController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'Home']);
Route::get('/biografy', [BiografyController::class, 'Biografy']);
Route::get('/galery', [GaleryController::class, 'Galery']);
Route::get('/galery/{uuid}', [GaleryController::class, 'GaleryDetail']);
Route::get('/tentang', [AboutController::class, 'About']);
Route::get('/register', [AuthController::class, 'Register']);
Route::post('/postregister', [AuthController::class, 'PostRegister']);
Route::get('/kontak', [ContactController::class, 'Contact']);
Route::post('/komentar', [ContactController::class, 'KomentarMember']);

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'Login']);
Route::post('/postlogin', [AuthController::class, 'PostLogin']);

Route::middleware(['superadmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'AllUser']);
    Route::get('/useruuid/{uuid}', [UserController::class, 'UserByUuid']);
    Route::post('/adduser', [UserController::class, 'AddUser']);
    Route::post('/updateuser', [UserController::class, 'UpdateUser']);
    Route::post('/uservalidate', [UserController::class, 'ValidasiUser']);
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

    Route::get('/kegiatan', [KegiatanController::class, 'AllKegiatan']);
    Route::get('/kegiatanuuid/{uuid}', [KegiatanController::class, 'KegiatanByUuid']);
    Route::post('/addkegiatan', [KegiatanController::class, 'AddKegiatan']);
    Route::post('/updatekegiatan', [KegiatanController::class, 'UpdateKegiatan']);
    Route::get('/deletekegiatan/{uuid}', [KegiatanController::class, 'DeleteKegiatan']);

    Route::get('/bidang', [BidangController::class, 'AllBidang']);
    Route::post('/addbidang', [BidangController::class, 'AddBidang']);
    Route::post('/updatebidang', [BidangController::class, 'UpdateBidang']);
    Route::get('/deletebidang/{uuid}', [BidangController::class, 'DeleteBidang']);

    Route::get('/profesi', [ProfesiController::class, 'AllProfesi']);
    Route::post('/addprofesi', [ProfesiController::class, 'AddProfesi']);
    Route::post('/updateprofesi', [ProfesiController::class, 'UpdateProfesi']);
    Route::get('/deleteprofesi/{uuid}', [ProfesiController::class, 'DeleteProfesi']);

    Route::get('/ukm', [AboutUkmController::class, 'AllAboutUkm']);
    Route::get('/detai/{uuid}', [AboutUkmController::class, 'ByUuidAboutUkm']);
    Route::post('/addukm', [AboutUkmController::class, 'AddAboutUkm']);
    Route::post('/updateukm', [AboutUkmController::class, 'UpdateAboutUkm']);
    Route::get('/deleteukm/{uuid}', [AboutUkmController::class, 'DeleteAboutUkm']);


    Route::get('/homesetup', [HomeSetupController::class, 'AllHomesetup']);
    Route::get('/homesetup/{uuid}', [HomeSetupController::class, 'HomesetupByUuid']);
    Route::post('/addhomesetup', [HomeSetupController::class, 'AddHomesetup']);
    Route::post('/updatehomesetup', [HomeSetupController::class, 'UpdateHomesetup']);
    Route::get('/deletehomesetup/{uuid}', [HomeSetupController::class, 'DeleteHomesetup']);


    Route::get('/saran', [SaranController::class, 'AllSaran']);
    Route::post('/tambahsaran', [SaranController::class, 'AddSaran']);
    Route::get('/deletesaran/{uuid}', [SaranController::class, 'DeleteSaran']);


    Route::get('/modul', [ModulController::class, 'AllModul']);
    Route::get('/addmodul', [ModulController::class, 'AddModulShow']);
    Route::post('/postaddmodul', [ModulController::class, 'AddModul']);
    Route::get('/updatemodul/{uuid}', [ModulController::class, 'UpdateModulShow']);
    Route::post('/postupdatemodul', [ModulController::class, 'UpdateModul']);
    Route::get('/deletemodul/{uuid}', [ModulController::class, 'DeleteModul']);

    Route::get('/kelasmember', [KelasMemberController::class, 'AllKelasMember']);
});
Route::middleware(['member'])->group(function () {
    Route::get('/index', [MemberController::class, 'IndexMember'])->name('index');
    Route::post('/checkoutkelas', [MemberController::class, 'CheckoutKelas']);
    Route::get('/mykelas', [MemberController::class, 'MyLearnKelas']);
    Route::get('/myprofile', [MemberController::class, 'MyProfileAccount']);
});
