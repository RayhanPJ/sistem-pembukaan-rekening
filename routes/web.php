<?php

use App\Http\Controllers\SupervisiController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\CsController;
use App\Http\Controllers\PekerjaanController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('postlogin', [AuthController::class, 'postLogin'])->name('postlogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('postRegist', [RegisterController::class, 'store'])->name('postRegist');

Route::middleware(['auth'])->group(function () {
    Route::get('regist', [RegisterController::class, 'index'])->name('regist');
    Route::get('getPekerjaan', [PekerjaanController::class, 'getPekerjaan'])->name('getPekerjaan');
    Route::get('getCabang', [CabangController::class, 'getCabang'])->name('getCabang');
    //Region
    Route::get('getProvinces', [RegionController::class, 'getProvinces'])->name('getProvinces');
    Route::get('getRegencies/{id}', [RegionController::class, 'getRegencyByProvincyId'])->name('getRegencies');
    Route::get('getDistrict/{id}', [RegionController::class, 'getDistrictByRegencyId'])->name('getDistrict');
    Route::get('getVillages/{id}', [RegionController::class, 'getVillageByDistrictId'])->name('getVillages');

    Route::get('form-input-nasabah', [CsController::class, 'create'])->name('formNasabah.cs');
    Route::get('list-data-nasabah', [CsController::class, 'index'])->name('listNasabah.cs');
    Route::get('get-data-nasabah', [CsController::class, 'getNasabah'])->name('getNasabah.cs');
    Route::post('input-data-nasabah', [CsController::class, 'store'])->name('inputNasabah.cs');

    Route::post('approve-data-nasabah/{id}', [SupervisiController::class, 'approveNasabah'])->name('approveNasabah.supervisi');
    Route::post('cancel-data-nasabah/{id}', [SupervisiController::class, 'cancelNasabah'])->name('cancelNasabah.supervisi');

    Route::get('list-data-users', [AdminController::class, 'index'])->name('listUsers.admin');
    Route::post('approve-data-user/{id}', [AdminController::class, 'approveUser'])->name('approveUser.admin');
    Route::get('delete-data-user/{id}', [AdminController::class, 'deleteUser'])->name('deleteUser.admin');
    Route::get('get-data-user', [AdminController::class, 'getUsers'])->name('getUsers.admin');
});
